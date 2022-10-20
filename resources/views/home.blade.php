@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <button type="button" class="btn btn-secondary btn-lg class0">”カテゴリ”から選ぶ</button>
    <button type="button" class="btn btn-secondary btn-lg class0">”メーカー”から選ぶ</button>
    <a href="{{url('search')}}" class="btn btn-secondary btn-lg">”キーワード”から選ぶ</a>
    <br>
    <button type="button" class="btn btn-secondary btn-lg class1 jyoon">常温加工</button>
    <button type="button" class="btn btn-secondary btn-lg class1 child">冷凍</button>
    <button type="button" class="btn btn-secondary btn-lg class1 liquor">酒類</button>
    <button type="button" class="btn btn-secondary btn-lg class1 sweets">菓子</button>
    <br>
    <a href="{{url('item/1/1')}}" class="btn btn-secondary btn-lg class2">ギフト</a>
    <button type="button" class="btn btn-secondary btn-lg class2">ギフト</button>
    <button type="button" class="btn btn-secondary btn-lg class2">スープ</button>
    <button type="button" class="btn btn-secondary btn-lg class2">スプレッド</button>
    <button type="button" class="btn btn-secondary btn-lg class2">その他加工食品</button>
    <button type="button" class="btn btn-secondary btn-lg class2">パン・シリアル類</button>
    <button type="button" class="btn btn-secondary btn-lg class2">ビン・缶詰</button>
    <button type="button" class="btn btn-secondary btn-lg class2">ホームメイキング材料</button>
    <button type="button" class="btn btn-secondary btn-lg class2">果汁・トマト・野菜飲料</button>
    <button type="button" class="btn btn-secondary btn-lg class2">乾物</button>
    <button type="button" class="btn btn-secondary btn-lg class2">穀物</button>
    <button type="button" class="btn btn-secondary btn-lg class2">食用油</button>
    <button type="button" class="btn btn-secondary btn-lg class2">清涼飲料</button>
    <button type="button" class="btn btn-secondary btn-lg class2">調味料</button>
    <button type="button" class="btn btn-secondary btn-lg class2">調理品</button>
    <button type="button" class="btn btn-secondary btn-lg class2">乳製品</button>
    <button type="button" class="btn btn-secondary btn-lg class2">粉類</button>
    <button type="button" class="btn btn-secondary btn-lg class2">麺類</button>
    <button type="button" class="btn btn-secondary btn-lg class2">嗜好飲料</button>

    
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="{{ mix('js/app.js') }}"></script>
@stop

