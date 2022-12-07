@extends('adminlte::page')

@section('title', 'My Page')

@section('content_header')
    <h1>Ranking</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">"いいね"ランキング</h3>
                </div>
                @if($items)
                    <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>順位</th>
                                        <th>いいね数</th>
                                        <th>JAN</th>
                                        <th>商品名</th>
                                        <th>メーカー名</th>
                                        <th>特徴</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $rank[$item->id] }}</td>
                                            <td>{{ $likes_number[$item->id] }}</td> 
                                            <td>{{ $item->JAN }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->maker }}</td>
                                            <td>{{ $item->feature }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                @else
                    <h1>まだ"いいね"はされていません</h1>
                @endif
            </div>
        </div>
    </div>
@stop