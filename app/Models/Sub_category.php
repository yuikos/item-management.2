<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    use HasFactory;

    public function main_category(){
        return $this->belongsTo('App\Models\Main_category');
    }

    public function category(){
        return $this->hasMany('App\Models\Category');
    }
}
