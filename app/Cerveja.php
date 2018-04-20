<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cerveja extends Model
{
    protected $fillable = array('nome', 'IBU', 'ABV', 'SRM', 'EBC', 'estilo_id', 'color_id', 'copo_id');

    public function estilo() {
        return $this->belongsTo('App\Estilo');
    }
    public function copo() {
        return $this->belongsTo('App\Copo');
    }
    public function color() {
        return $this->belongsTo('App\Color');
    }

}
