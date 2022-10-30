@extends('adminlte::page')

@section('title', 'My Page')

@section('content_header')
    <h1>キーワード検索</h1>
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
                        <select id="class11" name='class11' class='form-control flex-items' onChange="pickclass2();">
                            <option value=''>大分類を選んでください</option>
                            <option value='1'>常温加工</option>
                            <option value='2'>冷凍・チルド</option>
                            <option value='3'>酒類</option>
                            <option value='4'>菓子</option>
                         </select>
                        <select id="category" name="category" class='form-control mr-2 flex-items'>
                           <option value="">中分類を選んでください</option>
                               @foreach($categorys as $category)
                                   <option value="{{ $category }}">{{ $category }}</option>
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
                                    {{-- <td>{{ $likes_number[$item->id] }}</td>  --}}
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
@stop
