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
        $class11 = $request->class11;
        $class21 = $request->category;
        $search_word = $request->key;
        $categorys = Item::where('class11',$class11)->pluck('class2');

        if (!empty($search_word))
        {
            $items = Item::where('class11','=',$class11)
                    ->where('class2','=',$class21)
                    ->where('feature', 'like', '%' . $search_word . '%')
                    ->get();
            $keyword = new Keyword();
            $keyword->keyword = $request->key;
            $keyword->user_id = Auth::id();
            $keyword->save();

        }else{
            $items = Item::All();
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
        // dd(ajax);

        $class11 = $request->value;
        
        $categorys = Item::where('class11',$class11)
                    ->groupBy('class2')
                    ->pluck('class2');
        return response()->json($categorys);
    }

    public function rank()
    {
        $keyword = Keyword::All();
        
    }

    
}
