@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <p>今週検索された商品ランキング</p>
   
   

@stop



