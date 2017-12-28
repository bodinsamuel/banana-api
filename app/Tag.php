<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $table = 'tags';

    protected $primaryKey = 'tags_id';

    protected $fillable = ['tags_id', 'title', 'is_main'];

    protected $dateFormat = 'Y-m-d H:i:s';

    const CREATED_AT = 'date_created';

    const UPDATED_AT = 'date_updated';

    const DELETED_AT = 'date_deleted';

    public function quiz()
    {
        return $this->belongsToMany('App\Quiz', 'quiz_has_tags');
    }

    public function apiGetLinks()
    {
        return [
            'self' => route('get_tag', ['name' => $this->url]),
            'quizzes' => route('get_quizzes', ['tag' => $this->getKey()]),
        ];
    }

}
