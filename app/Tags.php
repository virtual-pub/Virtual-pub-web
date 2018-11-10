<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = array('user_id', 'estilo_id', 'valor');


    /**
     * 
     * 
     * 
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
    /**
     * 
     * 
     * 
     */
    public function estilo() {
        return $this->belongsTo('App\Estilo');
    }
}
