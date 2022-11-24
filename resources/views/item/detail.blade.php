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
                </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>いいね数</th>
                                    <th>JAN</th>
                                    <th>商品名</th>
                                    <th>メーカー名</th>
                                    <th>特徴</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>
                                            @if($like_number)
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
                                        <td>{{ $like_number }}</td>
                                        <td>{{ $item->JAN }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->maker }}</td>
                                        <td>{!! nl2br(htmlspecialchars($item->feature)) !!}</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@stop