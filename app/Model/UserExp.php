<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserExp extends Authenticatable
{
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $table = 'user_work_exp';
    
}