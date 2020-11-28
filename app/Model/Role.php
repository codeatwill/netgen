<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $table = 'roles';
    
    /**
     * Get the role associated with the user.
     */
    public function userRoles()
    {
        return $this->hasOne('App\User');
    }
}
