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
                    <form class="form-horizontal find" action = "{{ url('search') }}" method="post"  class="form-horizontal">
                        @csrf
                        {{-- <select class="form-control" name="gender">
                            <option disabled selected>大分類を選択してください</option>
                            <option value="jyoon">常温加工</option>
                            <option value="child">冷凍・チルド</option>
                            <option value="sweet">菓子</option>
                            <option value="liquor">酒類</option>
                        </select> --}}
                        <select class="form-control" name="gender">
                            <option selected="selected" value="">選択してください</option>
                            @foreach(config('class11') as $class1 => $class11)
                              <option value="{{ $class1 }}" >
                                {{ $class11['label'] }}
                              </option>
                            @endforeach
                        </select>
                        <select class="form-control" name="gender">
                            <option selected="selected" value="">選択してください</option>
                            @foreach(config('class21') as $class2 => $class21)
                              <option value="{{ $class2 }}" >
                                {{ $class21['label'] }}
                              </option>
                            @endforeach
                        </select>
                        <p><input type="text" name="keyword" value="{{$keyword}}"></p>
                        <p><input type="submit" value="検索"></p>
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

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">        
@stop
