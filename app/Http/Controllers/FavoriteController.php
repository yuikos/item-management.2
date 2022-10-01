<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    //
    public function favorite(Request $request)
    {

        $favorite = new Favorite;
        $favorite->item_id = $request->item_id;
        $favorite->user_id = Auth::user()->id;
        $favorite->save();

        return redirect()->route('class');
    }

    public function destroy(Request $request, $id) {
        $favorite=Favorite::findOrFail($id);

        $favorite->$favorite()->delete();

        return redirect()->route('class');
    }
}

