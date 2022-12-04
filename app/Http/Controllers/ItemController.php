<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all();
        // $favorites = Item::with('users')->get();
        return view('item.home', compact('items'));

    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        $class11 = $request->class11;
        $class21 = $request->category;
        $categorys = Item::where('class11',$class11)->pluck('class2');

        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'maker' => $request->maker,
                'name' => $request->name,
                'JAN' => $request->JAN,
                'class11' =>$request->class11,
                'class21' =>$request->class21,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add',[
            'class11'=>$class11,
            'categorys'=>$categorys,
        ]);
    }

    public function ajax(Request $request)
    {
        header('Content-type:application/json;charset=utf-8');
 
        $class11 = $request->value;
        
        $categorys = Item::where('class11',$class11)
                    ->groupBy('class2')
                    ->pluck('class2');
                    
        return response()->json($categorys);
    }
}
