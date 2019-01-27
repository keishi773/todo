<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function cards(){
        return $this->hasMany('App\Card');
    }
}
