<?php

namespace App\Library\Api;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Handler
{
    /**
     * Current state of HTTP Request
     * @var array
     */
    private $state = null;

    /**
     * Global links, optionnal
     * @var array
     */
    private $links = null;

    /**
     * Related collections, optionnal
     * @var array
     */
    private $collection = null;

    /**
     * Force the base to be an array of model
     * @var boolean
     */
    private $is_collection = false;

    /**
     * Sideloading
     * @var array
     */
    private $sideloading = false;
    private $sideload = [];

    /**
     * Custom data, optionnal (cannot be mixed with models)
     * @var array
     */
    private $data = null;


    public function __construct()
    {
        // assume all request are 200 OK
        // Up to the controller to change http code accordingly
        $this->setState(200, 'OK');
    }

    /**
     * Set state of the request
     * @param uint $code  HTTP_CODE
     * @param string $message informative message
     */
    public function setState($code, $message = '')
    {
        $this->state = [
            'code' => (int)$code,
            'message' => $message
        ];
    }

    /**
     * Embed model in response
     * @param Collection $model
     */
    public function setCollection(Collection $collection)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Set base model as collection of model
     * @param Boolean $is
     */
    public function isCollection($is = true)
    {
        $this->is_collection = $is;

        return $this;
    }

    /**
     * @param Boolean $is
     */
    public function enableSideloading($enable = true)
    {
        $this->sideloading = $enable;

        return $this;
    }

    /**
     * Set a global link (not related to a model, like pagination)
     * @param string $name
     * @param string $link
     */
    public function addLink($name, $link)
    {
        $this->links[$name] = $link;
    }

    /**
     * Get current State code
     * @return uint
     */
    public function getCode()
    {
        return $this->state['code'];
    }

    /**
     * Send http formatted response based on what has been given
     */
    public function send()
    {
        $return = [];

        $return['state'] = $this->state;

        // If not a 200 OK ignore all
        if ($this->getCode() === 200)
        {
            if (!empty($this->links))
                $return['links'] = $this->links;

            // You only get model or custom data
            // custom data, will not be parsed
            if ($this->data)
            {
                $return['data'] = $this->data;
            }
            elseif ($this->collection)
            {
                $export = $this->exportModel($this->collection);
                if ($export)
                {
                    if ($this->is_collection)
                        $return['data'] = $export;
                    else
                        $return['data'] = $export[0];
                }
                else
                {
                    $return['data'] = null;
                }
            }
            if ($this->sideloading === true)
            {
                $return['included'] = $this->sideload;
            }
        }

        // return a Laravel standard http response object
        return response()->json($return, $this->getCode());
    }


    /**
     * Automatically format given model into jsonapi.org standard
     * @param  Array $models
     * @return array
     */
    private function exportModel($models, $level = 1)
    {
        $return = [];
        if (empty($models))
            return null;

        foreach ($models as $model)
        {
            $export = [];

            // detect type of model with classname
            $className = get_class($model);
            $type = method_exists($model, 'getApiType') ? $model->getApiType() : mb_strtolower(substr($className, strrpos($className, '\\')+1));

            $export['type'] = $type;
            $export['id'] = $model->getKey();

            $export['attributes'] = $model->attributesToArray();
            unset($export['attributes'][$model->getKeyName()]);
            foreach ($export['attributes'] as $key => $value) {
                if (strpos($key, '_id') !== FALSE)
                    unset($export['attributes'][$key]);
            }

            // Get links from models
            if (method_exists($model, 'apiGetLinks'))
                $export['links'] = $model->apiGetLinks();

            // relationships can not simply be embed as object
            // It should be sideloaded
            foreach ($model->getRelations() as $relType => &$relModels)
            {
                $isSingle = false;
                if ($relModels instanceof Model)
                {
                    $isSingle = true;
                    $relModels = [$relModels];
                }
                $_rel_type = method_exists($relModels[0], 'getApiType') ? $relModels[0]->getApiType() : $relType;

                // TODO: sideload this
                $relExported = $this->exportModel($relModels, $level+1);
                if ($isSingle)
                    $export['relationships'][$_rel_type]['data'] = $relExported[0];
                else
                    $export['relationships'][$_rel_type]['data'] = $relExported;
            }

            if ($level > 1 && $this->sideloading === true)
            {
                $return[] = ['type' => $export['type'], 'id' => $export['id']];
                $this->sideload[] = $export;
            }
            else
            {
                $return[] = $export;
            }
        }

        return $return;
    }
}
