@extends('adminlte::page')

@section('title', 'My Page')

@section('content_header')
    <h1>新製品検索</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
                    <form action="{{ url('/search') }}" class="form-horizontal find" method="get"  class="form-horizontal">
                        @csrf
                        <select id="main_category" name='main_category' class="form-control" onChange="picksub_category();">
                            <option value=''>大分類を選んでください</option>
                            @foreach($main_categories as $main_category)
                                <option value="{{ $main_category->id }}">{{ $main_category->name }}</option>
                            @endforeach
                         </select>
                        <select id="sub_category" name="sub_category" class="form-control" onChange="pickcategory();">
                           <option value="">中分類を選んでください</option>
                            @foreach($sub_categories as $sub_category)
                                <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                            @endforeach
                        </select>
                        <select id="category" name="category" class="form-control">
                            <option value="">小分類を選んでください</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                         </select>
                        <div class="form-group">
                            <input type="text" name="key"  class="form-control" placeholder="キーワードを入力">
                        </div>
                        <input type="submit" value='探す' class='btn btn-success flex-items'>
                    </form>
                </div>
                <div class="items">
                    @if(!empty($items))
                        <table class="table table-striped table-hover">
                            <tr>
                                <th></th>
                                <th>いいね数</th>
                                <th>JAN</th>
                                <th>商品名</th>
                                <th>メーカー名</th>
                                <th>特徴</th>
                            </tr>
                            @foreach($items as $item)
                                <tr>
                                    <td><a href="{{ url('/detail/'.$item->id) }}">詳細</a></td>
                                    <td>{{ $item->like_number }}</td> 
                                    <td>{{ $item->JAN }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->maker }}</td>
                                    <td>{!! nl2br(htmlspecialchars($item->feature)) !!}</td>
                                </tr>
                            @endforeach
                            </table>
                    @else
                        <p>データがみつかりません</p>
                    @endif
                </div>
            </div>
       
 @endsection

@section('js')
    <script src="js/search.js"></script>
@endsection