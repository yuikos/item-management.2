@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>完了</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <p>送信しました!</p>
    <a href="{{ route('add') }}">戻る</a>
@stop