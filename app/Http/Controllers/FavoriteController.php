<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;

class FavoriteController extends Controller
{
    //
    public function favorite($item_id)
    {
        $user = Auth::user();
        $user->items()->sync($item_id);

        return redirect()->route('detail',$item_id);
    }

    public function unfavorite($item_id)
     {
        $user = Auth::user();

        $user->items()->sync($item_id);

        return redirect()->route('detail',$item_id);
    }
}

