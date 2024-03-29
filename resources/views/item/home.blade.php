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
                </div>
                <form action="{{ url('items/') }}" method="get">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
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
                                        <td><a href="{{ url('/detail/'.$item->id) }}">詳細</a></td>
                                        <td>{{ $item->like_number }}</td>
                                        <td>{{ $item->JAN }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->maker }}</td>
                                        <td>{!! nl2br(htmlspecialchars($item->feature)) !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-default">CSV出力</button>
                </form>
            </div>
        </div>
    </div>
@stop