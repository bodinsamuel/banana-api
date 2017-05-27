<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use SoftDeletes;

    protected $table = 'results';

    protected $primaryKey = 'result_id';

    protected $fillable = ['quiz_id', 'media_id', 'title', 'content', 'moreof'];

    protected $dateFormat = 'Y-m-d H:i:s';

    const CREATED_AT = 'date_created';

    const UPDATED_AT = 'date_updated';

    const DELETED_AT = 'date_deleted';
}
