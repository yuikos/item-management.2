@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <h5>★おすすめ商品★</h5>
    <table class="table">
        <tbody>
                <tr>
                    <th scope="row">JAN</th>
                    <td>{{ $recommend_item[0]->JAN }}</td>
                </tr>
                <tr>
                    <th scope="row">商品名</th>
                    <td>{{ $recommend_item[0]->name }}</td>
                </tr>
                <tr>
                    <th scope="row">メーカー名</th>
                    <td>{{ $recommend_item[0]->maker }}</td>
                </tr>
                <tr>
                    <th scope="row">特徴</th>
                    <td>{!! nl2br(htmlspecialchars($recommend_item[0]->feature)) !!}</td>
                </tr>
        </tbody>
    </table>
@stop



