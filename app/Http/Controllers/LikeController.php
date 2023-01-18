<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Like;

class LikeController extends Controller
{
    public function like($item_id)
    {
        Like::create([
            'item_id'=>$item_id,
            'user_id' => Auth::id(),
        ]);

        $item = Item::find($item_id);

        $like_number = Like::getCountLike($item_id);
        $user_like = Like::where('item_id',$item_id)
                    ->where('user_id', Auth::id())
                    ->first();

        return view('item.detail',[
            'item' => $item,
            'like_number'=>$like_number,
            'user_like'=>$user_like,
        ]);
    }

    public function unlike($item_id)
     {
        $like = Like::where('item_id',$item_id)
                ->where('user_id', Auth::id())
                ->first();
            

        $like->delete();

        $item = Item::find($item_id);

        $like_number = Like::getCountLike($item_id);
        $user_like = Like::where('item_id',$item_id)
                    ->where('user_id', Auth::id())
                    ->first();

        return view('item.detail',[
            'item' => $item,
            'like_number'=>$like_number,
            'user_like'=>$user_like,
        ]);
    }
}
