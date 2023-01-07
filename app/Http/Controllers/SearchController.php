<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Item;
use App\Models\Keyword;
use App\Models\Like;
use App\Models\Sub_category;
use App\Models\Main_category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function GuzzleHttp\Promise\all;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $main_category_id = $request->main_category;
        $main_categories = Main_category::all();
        $sub_categories = Sub_category::where('main_category_id', $main_category_id);
        $sub_category_id = $request->sub_category;
        $categories = Category::where('sub_category_id',$main_category_id);
        $category_id = $request->category;
        $search_word = $request->key;
        
        if (!empty($search_word))
        {
            $items = Item::where('category_id','=',$category_id)
                    ->where('feature', 'like', '%' . $search_word . '%')
                    ->get();
            $keyword = new Keyword();
            $keyword->keyword = $request->key;
            $keyword->user_id = Auth::id();
            $keyword->save();

        }elseif(empty($search_word) and isset($category_id))
        {
            $items = Item::where('category_id','=',$category_id)
                    ->get();
        }else
        {
            $items = Item::All();
        };
        
        foreach($items as $item){
            // $item_id[]=$item->id;
            $item['like_number'] = Like::getCountLike($item->id);
        }
//dd($main_categories);
        return view('search', [
            'main_categories' => $main_categories,
            'sub_categories'=>$sub_categories,
            'categories'=>$categories,
            'items'=>$items,
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
}