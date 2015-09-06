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
     * Related model, optionnal
     * @var array
     */
    private $model = null;

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
    public function setModel(Collection $model)
    {
        $this->model = $model;

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
                $return['data'] = $this->data;
            elseif ($this->model)
            {
                $export = $this->exportModel($this->model);
                $return['data'] = $export ? $this->exportModel($this->model)[0] : null;
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
    private function exportModel($models)
    {
        $return = [];
        if (empty($models))
            return null;

        foreach ($models as $model)
        {
            $export = [];

            // detect type of model with classname
            $className = get_class($model);
            $type = mb_strtolower(substr($className, strrpos($className, '\\')+1));

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

                // TODO: sideload this
                $relExported = $this->exportModel($relModels);
                if ($isSingle)
                    $export['relationships'][$relType] = $relExported[0];
                else
                    $export['relationships'][$relType] = $relExported;
            }

            $return[] = $export;
        }

        return $return;
    }
}
