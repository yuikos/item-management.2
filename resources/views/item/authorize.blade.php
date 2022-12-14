@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>承認画面</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <form action="{{url('items/authorize')}}" method="post">
                    <table class="table">
                        <tbody>
                                <tr>
                                    <th scope="row">登録者</th>
                                    <td>{{ $recommend_item->JAN }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">JAN</th>
                                    <td>{{ $recommend_item->JAN }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">商品名</th>
                                    <td>{{ $recommend_item->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">メーカー名</th>
                                    <td>{{ $recommend_item->maker }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">特徴</th>
                                    <td>{!! nl2br(htmlspecialchars($recommend_item->feature)) !!}</td>
                                </tr>
                        </tbody>
                    </table>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">商品登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
