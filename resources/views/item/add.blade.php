@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="get">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="maker">メーカー名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="●●●●株式会社">
                        </div>

                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label for="JAN">JAN</label>
                            <input type="number" class="form-control" id="type" name="type" placeholder="4900000000">
                        </div>

                        <div class="form-group">
                            <label for="class11">カテゴリー大分類</label>
                            <select class="form-control" id="class11" name='class11' onChange="pickcategory();">
                                <option value='1'>常温</option>
                                <option value='2'>低温</option>
                                <option value='3'>酒類</option>
                                <option value='4'>菓子</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category">カテゴリー中分類</label>
                            <select class="form-control" id="category"  name="category">
                                <option value="">中分類を選んでください</option>
                                    @foreach($categorys as $category)
                                        <option value="{{ $category }}">{{ $category }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


@section('js')
    <script src="{{ asset('/js/item.add.js') }}"></script>
@stop
