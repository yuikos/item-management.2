@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <button type="button" class="btn btn-secondary btn-lg class1">”カテゴリ”から選ぶ</button>
    <button type="button" class="btn btn-secondary btn-lg class1">”メーカー”から選ぶ</button>
    <button type="button" class="btn btn-secondary btn-lg class1">”キーワード”から選ぶ</button>
    <br>
    <button type="button" class="btn btn-secondary btn-lg class2 jyoon">常温加工</button>
    <button type="button" class="btn btn-secondary btn-lg class2 child">冷凍</button>
    <button type="button" class="btn btn-secondary btn-lg class2 liquor">酒類</button>
    <button type="button" class="btn btn-secondary btn-lg class2 sweets">菓子</button>
    <br>


@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="{{ mix('js/home.js') }}"></script>
@stop

