<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array('description', 'user_id');
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
