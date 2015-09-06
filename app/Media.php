<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use SoftDeletes;

    protected $table = 'media';

    protected $primaryKey = 'media_id';

    protected $fillable = [
        'user_id', 'type', 'mime', 'width', 'height',
        'hash'];

    protected $dateFormat = 'Y-m-d H:i:s';

    const CREATED_AT = 'date_created';

    const UPDATED_AT = 'date_updated';

    const DELETED_AT = 'date_deleted';

    public function getDateUpdatedAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-dTH:i:sP');
    }
}
