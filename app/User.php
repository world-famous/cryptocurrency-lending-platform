<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password','username','mobile','balance','tauth','tfver','status','emailv','smsv','vsent','vercode','secretcode','wallet','refid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function deposit()
    {
        return $this->hasMany('App\Deposit','id','user_id');
    }
    public function investment()
    {
        return $this->hasMany('App\Investment','id','user_id');
    }
    public function translog()
    {
        return $this->hasMany('App\Translog','id','user_id');
    }
    public function returnlog()
    {
        return $this->hasMany('App\Returnlog','id','user_id');
    }
    public function withdraw()
    {
        return $this->hasMany('App\Withdraw','id','user_id');
    }
}
