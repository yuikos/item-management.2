@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
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
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">メーカー名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="●●●●株式会社">
                        </div>

                        <div class="form-group">
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label for="type">JAN</label>
                            <input type="number" class="form-control" id="type" name="type" placeholder="4900000000">
                        </div>

                        <div class="form-group">
                            <label for="type">カテゴリー大分類</label>
                            <select class="form-control" id="type" name='age'>
                                <option value='1'>常温</option>
                                <option value='2'>低温</option>
                                <option value='3'>酒類</option>
                                <option value='4'>菓子</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">カテゴリー中分類</label>
                            <select class="form-control" id="type"  name="category" onChange="pickclass2();">
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

@section('css')
@stop

@section('js')
@stop
