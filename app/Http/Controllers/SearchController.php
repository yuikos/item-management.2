<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Keyword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::id();
        $items = Item::All();

        $class11 = $request->value;
        $categorys = Item::where('class11',$class11)->pluck('class2');

        dd($request);

        $key = new Keyword();
        $key->keyword = $request->key;
        $key->user_id = $user_id;
        $key->save();

        if (!empty($key)) {
            $items->where('feature', 'like', '%' . $key . '%');
        }
        
        return view('search', [
            'class11'=>$class11,
            'categorys'=>$categorys,
            'items'=>$items,
        ]);
    }

    public function ajax(Request $request)
    {
        header('Content-type:application/json;charset=utf-8');
        dd(ajax);

        $class11 = $request->value;
        
        $categorys = Item::where('class11',$class11)
                    ->groupBy('class2')
                    ->pluck('class2');
        return response()->json($categorys);
    }

    
}
