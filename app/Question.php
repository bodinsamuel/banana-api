<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $primaryKey = 'question_id';

    protected $fillable = ['quiz_id', 'user_id', 'media_id', 'title', 'state_order'];

    protected $dateFormat = 'Y-m-d H:i:s';

    const CREATED_AT = 'date_created';

    const UPDATED_AT = 'date_updated';

    const DELETED_AT = 'date_deleted';

    public function answers()
    {
        return $this->hasMany('App\Answer')->select(['answer_id', 'question_id', 'user_id', 'media_id', 'title', 'is_right', 'state_order']);
    }
}
