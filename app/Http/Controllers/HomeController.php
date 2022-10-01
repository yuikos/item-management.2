<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Favorite;
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
        return view('home');
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

        $favorites = Item::where('favorites')
                    ->get();
        
        return view('item.index', [
            'class11' => $class11,
            'class21' => $class21,
            'items' => $items,
            'favorites' => $favorites,
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


}
