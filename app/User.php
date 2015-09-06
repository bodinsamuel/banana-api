<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract
{
    use SoftDeletes;
    use Authenticatable;

    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $fillable = ['login', 'email', 'password'];

    protected $hidden = ['password'];

    const CREATED_AT = 'date_created';

    const UPDATED_AT = 'date_updated';

    const DELETED_AT = 'date_deleted';

    public function apiGetLinks()
    {
        return [
            'self' => route('get_user', ['id' => $this->getKey()]),
        ];
    }

    // RELATIONSHIPS
    public function media()
    {
        return $this->belongsTo('App\Media');
    }

}
