<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'maker',
        'name',
        'JAN',
        'feature',
        'category_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function scopeSerach(Builder $query, array $params):Builder
    {
    // カテゴリ絞り込み
        if (!empty($params['class11'])) $query->where('class11', $params['class11']);
        // if (!empty($params['class21'])) $query->where('class21', $params['class21']);

        // キーワード検索
        if (!empty($params['keyword'])) {
            $query->where(function ($query) use ($params) {
                $query->where('feature', 'like', '%' . $params['keyword'] . '%');
            });
        }

        return $query;
    }

    
}
