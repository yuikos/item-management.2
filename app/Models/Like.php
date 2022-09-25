<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function item(){
        return $this->belongsTo('App\Item');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
