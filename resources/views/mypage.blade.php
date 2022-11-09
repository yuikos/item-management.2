@extends('adminlte::page')

@section('title', 'My Page')

@section('content_header')
    <h1>My Page</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">お気に入り一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if($items)
                    <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>いいね数</th>
                                        <th>JAN</th>
                                        <th>商品名</th>
                                        <th>メーカー名</th>
                                        <th>特徴</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>
                                                {{-- @dd($likes); --}}
                                                @if($likes_number[$item->id])
                                                    <div class="col-md-3">
                                                    <form action="{{ url('/unlike/'.$item->id) }}" method="POST">
                                                        @csrf
                                                        <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                                                    </form>
                                                    </div>
                                                @else
                                                    <div class="col-md-3">
                                                    <form action="{{ url('/like/'.$item->id) }}" method="POST">
                                                        @csrf
                                                        <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                                                    </form>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $likes_number[$item->id] }}</td> 
                                            <td>{{ $item->JAN }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->maker }}</td>
                                            <td>{!! nl2br(htmlspecialchars($item->feature)) !!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                         <form action="{{ url('/mycsv') }}" method="get">
                            <button type="submit">CSV出力</button>
                        </form>
                @else
                    <h1>まだお気に入り登録はされていません</h1>
                @endif
                </div>
            </div>
        </div>
    </div>
@stop