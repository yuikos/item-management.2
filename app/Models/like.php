<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class like extends Model
{
    use HasFactory;

    protected $fillable = ['item_id','user_id'];

    public static function getCountLike($item_id)
    {
        return DB::table('likes')
                ->where('item_id',$item_id)
                ->count();
    }

}
