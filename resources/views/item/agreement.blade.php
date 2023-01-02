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
                @if(!empty($input))
                    <p>承認依頼商品はありません</p>
                @else
                <form action="{{url('items/permisson')}}" method="post">
                    @csrf
                    <div class="md-form">
                        <label for="maker">メーカー名</label>
                        {{ $input["maker"] }}
                        <input class="form-control" type="hidden" id="maker" name="name" required value="{{ $input["maker"] }}">
                    </div>
            
                    <div class="md-form">
                        <label for="name">商品名</label>
                        {{ $input["name"] }}
                        <input class="form-control" type="hidden" id="name" name="email" required value="{{ $input["name"] }}">
                    </div>

                    <div class="md-form">
                        <label for="JAN">JAN</label>
                        {{ $input["JAN"] }}
                        <input class="form-control" type="hidden" id="JAN" name="email" required value="{{ $input["JAN"] }}">
                    </div>
            
                    <div class="md-form">
                        <label for="main_category">カテゴリー大分類</label>
                        {{ $input["main_category"] }}
                        <input class="form-control" type="hidden" id="main_category" name="password" required value="{{ $input["main_category"] }}">
                    </div>

                    <div class="md-form">
                        <label for="sub_category">カテゴリー中分類</label>
                        {{ $input["sub_category"] }}
                        <input class="form-control" type="hidden" id="sub_category" name="password" required value="{{ $input["sub_category"] }}">
                    </div>

                    <div class="md-form">
                        <label for="category_id">カテゴリー小分類</label>
                        {{ $input["category_id"] }}
                        <input class="form-control" type="hidden" id="category_id" name="password" required value="{{ $input["category_id"] }}">
                    </div>

                    <div class="md-form">
                        <label for="feature">詳細</label>
                        {{ $input["feature"] }}
                        <input class="form-control" type="hidden" id="feature" name="password" required value="{{ $input["feature"] }}">
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">商品登録</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
@stop
