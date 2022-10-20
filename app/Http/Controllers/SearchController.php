<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {   
        $class11 = $request->input('class1');
        $class21 = $request->input('class2');
        $keyword = $request->input('keyword');
 
        $query = Item::query();
 
        if (!empty($class1)) {
            $query->where('class11', '=', "%{$class1}%");
        }

        if (!empty($class2)) {
            $query->where('class21', '=', "%{$class2}%");
        }
 
        if (!empty($keyword)) {
            $query->where('feature', 'LIKE', "%{$keyword}%");
        }
 
        $items = $query->get();
 
        return view('search',[
            'items'=>$items,
            'class1'=>$class11,
            'class2'=>$class21,
            'keyword'=>$keyword,
        ]);
        
    }
    
}
