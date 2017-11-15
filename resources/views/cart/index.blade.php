@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-11">
    @if($total_price===0)
        <h2>カートの中身はありません</h2>
    @endif
    @if($total_price!==0)
        <h2>合計{{$total_price}}円</h2>
        <br>
        <table class="table">
            <thread>
                <tr>
                    <th></th>
                    <th>車名</th>
                    <th>価格</th>
                    <th>詳細</th>
                    <th></th>
                </tr>
            </thread>
            <tbody>
            @foreach($cart_items as $index => $item)
            <tr>
                <th><img src="/../image/{{$item->product_image}}.jpg"/></th>
                <th>{{$item->product_name}}</th>
                <th>{{number_format($item->product_price)}}円</th>
                <th>{{$item->product_detail}}</th>
                <th>{!! link_to(action('CartController@delete', ['index' => $index]),"削除") !!}</th>
            </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1">
        {!! link_to('home', '買い物を続ける', ['class' => 'btn btn-primary']) !!}
        <br>
        <br>
        @if($total_price!==0)
            {!! link_to('/confirm','買う', ['class' => 'btn btn-primary']) !!}
            <br>
            <br>
            {!! link_to('cart/reset', 'カートクリア', ['class' => 'btn btn-primary']) !!}
        @endif
    </div>
</div>
@endsection