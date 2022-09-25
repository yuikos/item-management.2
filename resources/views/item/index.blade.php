@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>JAN</th>
                                <th>商品名</th>
                                <th>メーカー名</th>
                                <th>特徴</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->JAN }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->maker }}</td>
                                    <td>{{ $item->feature }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::check())
    @if ($like)
    <form action="{{action('LikeController@destroy',$like->id)}}" method="POST" class="mb-4" >
    <input type="hidden" name="like_id" value="{{$like->id}}">
    @csrf
    @method('DELETE')
        <button type="submit">
          ブックマーク解除
        </button>
    </form>
    @else
    <form action="{{action('LikeController@store')}}" method="POST" class="mb-4" >
    @csrf
    <input type="hidden" name="like_id" value="{{$like->id}}">
        <button type="submit">
         ブックマーク
        </button>
    </form>

    @endif
  @endif
