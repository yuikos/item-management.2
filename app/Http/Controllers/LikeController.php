<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Like;
use App\Models\User;

class LikeController extends Controller
{
    public function like(Request $request)
    {

        $like = new Like;
        $like->item_id = $request->item_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        return view('item.index', [
            'like' => $like,
        ]);
    }

    public function destroy(Request $request, $id) {
        $item=Item::findOrFail($id);

        $item->like()->delete();

        return redirect()->route('item.index',[$request->item_id]);
    }
}