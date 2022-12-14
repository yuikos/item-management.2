@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>確認画面</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <form action="{{url('items/authorize')}}" method="post">
                    <table class="table">
                        <h5>【登録者】</h5>
                        <tbody>
                            <tr>
                                <th scope="row">氏名</th>
                                <td>{{ $recommend_item->JAN }}</td>
                            </tr>
                            <tr>
                                <th scope="row">メールアドレス</th>
                                <td>{{ $recommend_item->maker }}</td>
                            </tr>
                        </tbody>
                        <h5>【承認依頼情報】</h5>
                        <tbody>
                            <tr>
                                <th scope="row">メーカー名</th>
                                <td>{{ $recommend_item->maker }}</td>
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
                        <button type="submit" class="btn btn-primary">確認画面へ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
