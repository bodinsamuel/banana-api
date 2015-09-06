<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

    protected $table = 'answers';

    protected $primaryKey = 'answer_id';

    protected $fillable = ['question_id', 'user_id', 'media_id', 'title', 'is_right', 'state_order'];

    protected $dateFormat = 'Y-m-d H:i:s';

    const CREATED_AT = 'date_created';

    const UPDATED_AT = 'date_updated';

    const DELETED_AT = 'date_deleted';
}
