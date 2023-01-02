<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Main_category;
use App\Models\Sub_category;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

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
        $main_categories = Main_category::all();
        $sub_categories = Sub_category::where('main_category_id', $main_category_id);
        $categories = Category::where('sub_category_id',$main_category_id);

        return view('item.add',[
            'main_categories' => $main_categories,
            'sub_categories'=>$sub_categories,
            'categories'=>$categories,
       ]);

    }

    public function ajax_main(Request $request)
    {
        Log::debug('[ajax_main]: exec ajax_main');
        header('Content-type:application/json;charset=utf-8');

        $main_category_id = $request->value;
        Log::debug('[ajax_main]: main_category_id is ' . $request->value);
        $sub_categories = Sub_category::where('main_category_id',$main_category_id)->get();
        $i = 0;
        $resp_sub_cate = array();
        foreach ($sub_categories as $temp_sub) {
            Log::debug("[ajax_main]: [$i] id:" . $temp_sub->id);
            Log::debug("[ajax_main]: [$i] name:" . $temp_sub->name);
            Log::debug("[ajax_main]: [$i] main_category_id:" . $temp_sub->main_category_id);
            $resp_sub_cate[$i] = array('id'=>$temp_sub->id);
            $resp_sub_cate[$i] += array('name'=>$temp_sub->name);
            $i++;
        }
        //return response()->json($sub_categories);
        return response()->json($resp_sub_cate);
    }

    public function ajax_sub(Request $request)
    {
        Log::debug('[ajax_sub]:exec ajax_sub');
        header('Content-type:application/json;charset=utf-8');

        $sub_category_id = $request->value;
        
        $categories = Category::where('sub_category_id',$sub_category_id)->get();
        $i = 0;
        $resp_cate = array();
        foreach ($categories as $temp_cate) {
            Log::debug("[ajax_sub]: [$i] id:" . $temp_cate->id);
            Log::debug("[ajax_sub]: [$i] name:" . $temp_cate->name);
            Log::debug("[ajax_sub]: [$i] main_category_id:" . $temp_cate->sub_category_id);
            $resp_cate[$i] = array('id'=>$temp_cate->id);
            $resp_cate[$i] += array('name'=>$temp_cate->name);
            $i++;
        }
        //return response()->json($categories);
        return response()->json($resp_cate);
    }

    /**
     * 商品情報確認
     */
    
    private $formItems = ["maker", "name","JAN","main_category","sub_category","category_id", "feature"];

    public function post(Request $request)
    {
        $this->validate($request, [
            'maker' => 'required',
            'name' => 'required',
            'JAN' => 'required','digits_between:8,13','alpha_num_half',
            'main_category' =>'required',
            'sub_category' =>'required',
            'category_id' =>'required',
            'feature' => 'required',
         ],
         [
            'maker.required' => 'メーカー名は必須です。',
            'name.required'  => '商品名は必須項目です。',
            'JAN.required' => 'JANコードは必須です。',
            'main_category.required'  => 'カテゴリー大分類は必須項目です。',
            'sub_category.required'  => 'カテゴリー中分類は必須項目です。',
            'category_id.required' => 'カテゴリー小分類は必須です。',
            'feature.required'  => '商品詳細は必須項目です。',
         ]);
        
        $input = $request->only($this->formItems);
        $request->session()->put("form_input", $input);

        return redirect()->route('confirm',["input" => $input]);

    }

    public function confirm(Request $request)
    {
        $input = $request->session()->get("form_input");
		
		//セッションに値が無い時はフォームに戻る
		if(!$input){
            $main_category_id = $request->main_category;
            $main_categories = Main_category::all();
            $sub_categories = Sub_category::where('main_category_id', $main_category_id);
            $categories = Category::where('sub_category_id',$main_category_id);

			return redirect()->route('add',[
                'main_categories' => $main_categories,
                'sub_categories'=>$sub_categories,
                'categories'=>$categories,
            ]);
		}

		return view("item.confirm",["input" => $input]);
    }

    function send(Request $request){
		//セッションから値を取り出す
		$input = $request->session()->get("form_input");

        $item = new Item();
        $item->maker = $input["maker"];
        $item->name = $input["name"];
        $item->JAN = $input["JAN"];
        $item->feature = $input["feature"];
        $item->category_id = $input["category_id"];
        $item->save();
        
        $main_category_id = $request->main_category;
        $main_categories = Main_category::all();
        $sub_categories = Sub_category::where('main_category_id', $main_category_id);
        $categories = Category::where('sub_category_id',$main_category_id);

			return redirect()->route('add',[
                'main_categories' => $main_categories,
                'sub_categories'=>$sub_categories,
                'categories'=>$categories,
            ]);
		
	}

    function complete(){	
		return view("item.complete");
	}

    
}
