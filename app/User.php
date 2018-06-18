<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token',
        'avatar', 'provider_id', 'provider',
        'access_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'isMantenedor', 'isUser', 'isFabricante', 'fabricante_name'
    ]; 

    /**
     * 
     * 
     * 
     */
    public function isMantenedor()
    {
        return $this->isMantenedor;
    }

    /**
     * 
     * 
     * 
     */
    public function isFabricante()
    {
        return $this->isFabricante;
    }

    /**
     * 
     * 
     * 
     */
    public function isUser()
    {
        return $this->isUser;
    }

    /**
     * 
     * 
     * 
     */
    public function isOnline()
    {
        return Cache::has('user-is-online-'. Auth::user()->id);
    }

    /**
     * 
     * 
     * 
     */
    public function getAvatarAttribute($val)
    {
        return is_null($val) ? asset('images/avatar-placeholder.svg') : $val;
    }

    /**
     * 
     * 
     * 
     */
    public function post() 
    {
        return $this->belongsTo('App\Post');
    }



   
}
