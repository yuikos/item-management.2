<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Like;
use App\Models\Keyword;

class RankController extends Controller
{
    public function good()
    {   
        $likes = Like::query()
                    ->selectRaw(DB::raw('likes.item_id,count(likes.user_id) as likes_count'))
                    ->leftJoin('items', 'likes.item_id', '=', 'items.id')
                    ->groupBy('likes.item_id')
                    ->orderByRaw('count(likes.user_id) desc')
                    ->get();

        $count = 1;
        $rank = [];
        $prev_rank = 0;
        $prev_number = 0;
        $items = [];
        $likes_number = [];

        foreach($likes as $like){
            $items[] = Item::find($like->item_id);
            $likes_number[$like->item_id] = Like::getCountLike($like->item_id);
            if ($prev_number == $likes_number[$like->item_id]) {
                $rank[$like->item_id] = $prev_rank;
            } else {
                $rank[$like->item_id] = $count;
                $prev_rank = $count;
                $prev_number = $likes_number[$like->item_id];
            };
            $count++;
            if ($count>50) {
                break;
            };
        }


        return view('rank',[
            'rank'=>$rank,
            'likes'=>$likes,
            'items'=>$items,
            'likes_number'=>$likes_number,

        ]);
        
    }

    public function keyword()
    { 
        $keywords = Keyword::select(DB::raw('keyword, COUNT(*) as count'))
                        ->groupBy('keyword')
                        ->orderByDesc('count')
                        ->get();
        // $keywords = DB::select(DB::raw("SELECT keyword, count(*) as keyword_count FROM keywords group by keyword order by keyword_count desc"));

        $rank = [];
        $prev_rank = 1;
        $number = 1;
        $prev_count = 1;

        foreach($keywords as $keyword){
            if($prev_count == $keyword->count){
                $rank[$keyword->keyword] = $prev_rank;
            }else{
                $rank[$keyword->keyword] = $number;
                $prev_rank = $number;
                $prev_count = $keyword->count;
            }
            $number++;
        };

        return view('keywordrank',[
            'rank'=>$rank,
            'keywords'=>$keywords,
            'keyword_count'=>$keyword->count,
        ]);
        
    }
}
