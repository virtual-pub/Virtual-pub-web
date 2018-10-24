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
        'name', 'email', 'token', 'sobre', 'fabricante_name', 'website',
        'avatar','password', 'provider_id', 'provider',
        'access_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'isMantenedor', 'isUser', 'isFabricante', 
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
        return Cache::has('user-is-online-'. $this->id);
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
        return $this->hasMany('App\Post');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

   /**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function followers()
{
    return $this->belongsToMany(User::class, 'amizades', 'seguidor_id', 'user_id')->withTimestamps();
}

/**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function followings()
{
    return $this->belongsToMany(User::class, 'amizades', 'user_id', 'seguidor_id')->withTimestamps();
}

public function favoritas(){
    return $this->belongsToMany(Cerveja::class, 'cervejas_favoritas', 'user_id', 'cerveja_id')->withTimestamps();
}

/**
     * Return the user attributes.

     * @return array
     */
    public static function getAuthor($id)
    {
        $user = self::find($id);
        return [
            'id'     => $user->id,
            'name'   => $user->name,
            'email'  => $user->email,
            'url'    => '',  // Optional
            'avatar' => $user->avatar,  // Default avatar
        ];
    }




   
}
