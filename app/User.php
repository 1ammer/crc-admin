<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role(){

        return $this->belongsTo('App\Role','role_id');
    }

    public function isAdmin(){

        if($this->role->name =="admin" and $this->is_active==1){

            return true;
        }
        return false;
    }

    public function isTeacher(){

        if($this->role->name =="teacher" and $this->is_active==1){

            return true;
        }
        return false;
    }

    public function isStudent(){

        if($this->role->name =="student" and $this->is_active==1){

            return true;
        }
        return false;
    }

}
