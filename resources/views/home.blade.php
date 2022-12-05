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
            @foreach ($recommend_items as $recommend_item)
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
            @endforeach
        </tbody>
    </table>
@stop



