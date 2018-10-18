<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cerveja extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('nome', 'IBU', 'ABV', 'SRM', 'EBC', 'descricao', 'estilo_id', 'color_id', 'copo_id', 'fabricante_id');

    /**
     * 
     * 
     * 
     */
    public function estilo() {
        return $this->belongsTo('App\Estilo');
    }

    /**
     * 
     * 
     * 
     */
    public function copo() {
        return $this->belongsTo('App\Copo');
    }

    /**
     * 
     * 
     * 
     */
    public function color() {
        return $this->belongsTo('App\Color');
    }
    /**
     * 
     * 
     * 
     */
    public function fabricante() {
        return $this->belongsTo('App\User');
    }
    public function Favoritadas(){
        return $this->belongsToMany(Cerveja::class, 'cervejas_favoritas', 'cerveja_id', 'user_id')->withTimestamps();
    }

}
