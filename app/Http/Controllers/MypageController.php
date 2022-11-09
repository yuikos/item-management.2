<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\like;

class MypageController extends Controller
{
    public function mypage()
    {   
        $user_id = Auth::id();

        $likes = Like::where('user_id',$user_id)
                ->get();
        
        $items = [];
        $likes_number = [];
            foreach ($likes as $like){
                $items[] = Item::find($like->item_id);
                $likes_number[$like->item_id] = Like::getCountLike($like->item_id);
            }
            // dd($items[]);
            return view('mypage',[
                'items'=>$items,
                'likes'=>$likes,
                'likes_number'=>$likes_number,
            ]);
        
        
    }

    public function mypageCSV()
    {
        $user_id = Auth::id();
        $likes = Like::where('user_id',$user_id)
                ->get();

        foreach ($likes as $like){
             $items[] = Item::find($like->item_id);
             $likes_number[$like->item_id] = Like::getCountLike($like->item_id);
        }

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
            //    dd($temparray);
            }
        }
        // ファイルを閉じる
        fclose($f);
   
        // HTTPヘッダ
        header("Content-Type: application/octet-stream");
        header('Content-Length: '.filesize('test.csv'));
        header('Content-Disposition: attachment; filename=test.csv');
        readfile('test.csv');
   
    }
}
