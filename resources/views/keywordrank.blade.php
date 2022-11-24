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
                    <h3 class="card-title">"検索キーワード"ランキング</h3>
                    <div class="card-tools">
                    </div>
                </div>
                    <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>順位</th>
                                        <th>検索キーワード</th>
                                        <th>検索回数</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keywords as $keyword)
                                        <tr>
                                            <td>{{ $rank[$keyword->keyword] }}</td>
                                            <td>{{ $keyword->keyword }}</td> 
                                            <td>{{ $keyword->count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
            </div>
        </div>
    </div>
@stop