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
     * 商品画面
     */
    public function add(Request $request)
    {
        $class11 = $request->class1;
        $categorys = Item::where('class11','=',$class11)->groupBy('class2')->pluck('class2');

        return view('item.add',[
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

    /**
     * 商品登録
     */

    public function store(Request $request)
    {
        $class11 = $request->class1;
        $class1 = Item::where('class11','=',$class11)->groupBy('class1')->first('class1');
        $categorys = Item::where('class11','=',$class11)->groupBy('class2')->pluck('class2');
        $class2 = $request->category;
        $class21 = Item::where('class2',$class2)->groupBy('class21')->first('class21');


        $this->validate($request, [
            'maker' => 'required',
            'name' => 'required',
            'JAN' => 'required','digits_between:8,13','alpha_num_half',
            'class1' =>'required',
            'category' =>'required',
            'feature' => 'required',
         ],
         [
            'maker.required' => 'メーカー名は必須です。',
            'name.required'  => '商品名は必須項目です。',
            'JAN.required' => 'JANコードは必須です。',
            'class1.required'  => 'カテゴリーは必須項目です。',
            'category.required' => 'カテゴリーは必須です。',
            'feature.required'  => '商品詳細は必須項目です。',
         ]);

         Item::create([
            'maker' => $request->maker,
            'name' => $request->name,
            'JAN' => $request->JAN,
            'class1' =>$class1->class1,
            'class2' =>$class2,
            'feature' => $request->feature,
            'class11'=>$class11,
            'class21'=>$class21->class21,
        ]);

        return view('item.add',[
            'categorys'=>$categorys,
       ]);
    }

}
