@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ url('/csv/'.$class11.'/'.$class21) }}" method="get">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>いいね</th>
                                    <th>JAN</th>
                                    <th>商品名</th>
                                    <th>メーカー名</th>
                                    <th>特徴</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        @if($favorites)
                                            <div class="col-md-3">
                                            <form action="{{ url('/favorite') }}" method="POST">
                                                @csrf
                                                <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                                            </form>
                                            </div>
                                        @else
                                            <div class="col-md-3">
                                            <form action="{{ url('/unfavorite') }}" method="POST">
                                                @csrf
                                                <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                                            </form>
                                            </div>
                                        @endif
                                        <td class="col-xs-2">{{ $item->favorites}}</td>
                                        <td class="col-xs-2">{{ $item->JAN }}</td>
                                        <td class="col-xs-2">{{ $item->name }}</td>
                                        <td class="col-xs-2">{{ $item->maker }}</td>
                                        <td class="col-xs-2">{{ $item->feature }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit">CSV出力</button>
                </form>
            </div>
        </div>
    </div>
@stop