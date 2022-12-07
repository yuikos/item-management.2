<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $recommend_item = Item::inRandomOrder()->first();

        return view('home',[
            'recommend_item' => $recommend_item,
        ]);
    }

    public function item()
    {
        return view('item');
    }

    public function class($class11,$class21)
    {   
        $items = Item::where('class11',$class11)
            ->where('class21',$class21)
            ->get();

        foreach($items as $item){
            // $item_id[]=$item->id;
            $item['like_number'] = Like::getCountLike($item->id);
        }
       
        return view('item.index', [
            'class11' => $class11,
            'class21' => $class21,
            'items' => $items,
            // 'like_number'=>$like_number,
        ]);
    }

    /**
     * csv出力
     */
    public function postCSV($class11,$class21)
    {
        // データの作成
        $items = Item::where('class11',$class11)
            ->where('class21',$class21)
            ->get();

        // カラムの作成
        $head = ['JAN', '商品名', 'メーカー名', '特徴'];
   
        // 書き込み用ファイルを開く
        $f = fopen('test.csv', 'w');
        if ($f) {
            // カラムの書き込み
            mb_convert_variables('SJIS', 'UTF-8', $head);
            fputcsv($f, $head);
            // データの書き込み
            foreach ($items as $item) {
                $temparray = [];
                $temparray[]= $item ->JAN;
                $temparray[]= $item ->name;
                $temparray[]= $item ->maker;
                $temparray[]= $item ->feature;
               mb_convert_variables('SJIS', 'UTF-8', $temparray);
               fputcsv($f, $temparray);
            }
        }
        // ファイルを閉じる
        fclose($f);
   
        // HTTPヘッダ
        header("Content-Type: application/octet-stream");
        header('Content-Length: '.filesize('test.csv'));
        header('Content-Disposition: attachment; filename=test.csv');
        readfile('test.csv');
   
        return view('item.index', [
            'class11' => $class11,
            'class21' => $class21,
            'items' => $items,

        ]);
   }

   public function detail($item_id)
    {   
        $item = Item::find($item_id);

        $this->likes = new Like();
        $like_number = Like::getCountLike($item_id);

        return view('item.detail', [
            'item' => $item,
            'like_number'=>$like_number,
        ]);
    }

    
}
