@extends('layouts.app')
@section('cart_view')
    <li><a href="cart/index">カートの中身を見る</a></li>
@endsection
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <h3>注文内容の確認</h3>
        @foreach($cart_items as $item)
            <img src="/image/{{$item->product_image}}.jpg"/>
            {{$item->product_name}}
            ￥{{number_format($item->product_price)}}
            <br>
        @endforeach
        <h3>お届け先住所</h3>
        <?php $address=strval($user->address)?>
        @if($address==='null')
            <a href="/address" class="link">住所追加</a>
        @endif
        @if($address!=='null')
            郵便番号<br>{{$user->zip}}<br>
            住所<br>{{$user->address}}<br>
            <a href="/address" class="link">住所変更</a>
        @endif
        <h3>支払い方法</h3>
            <h4>クレジットカード</h4>
        <h3>合計￥{{number_format($total_price*1.08)}}</h3>
        <h3>消費税￥{{number_format($total_price*1.08-$total_price)}}</h3>
            {!! link_to('/buy','注文確定', ['class' => 'btn btn-primary']) !!}
    </div>
@endsection