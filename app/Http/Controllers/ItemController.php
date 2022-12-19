<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Sub_category;

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

    public function add(Request $request)
    {
        $main_category_id = $request->main_category;
        $sub_categories = Sub_category::where('main_category_id','=',$main_category_id)->groupBy('name')->pluck('name');

        return view('item.add',[
            'sub_categories'=>$sub_categories,
       ]);

    }

    public function ajax(Request $request)
    {
        header('Content-type:application/json;charset=utf-8');

        $main_category_id = $request->value;
        
        $sub_categories = Sub_category::where('main_category_id',$main_category_id)->pluck('name');
        return response()->json($sub_categories);
    }

    /**
     * 商品情報確認
     */
     
    public function confirm(Request $request)
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
        
        $input = $request->only($this->formItems);
        $request->session()->put("form_input", $input);

        return redirect()->action("SampleFormController@confirm");

        return view('item.confirm',[
            'categorys'=>$categorys,
       ]);
    }

    // public function authorize(Request $request)
    // {
        
    //      Item::create([
    //         'maker' => $request->maker,
    //         'name' => $request->name,
    //         'JAN' => $request->JAN,
    //         'class1' =>$class1->class1,
    //         'class2' =>$class2,
    //         'feature' => $request->feature,
    //         'class11'=>$class11,
    //         'class21'=>$class21->class21,
    //     ]);

    //     return view('item.add',[
    //         'categorys'=>$categorys,
    //    ]);
    // }

}
