@extends('layouts.app')

@section('content')
    カートの内容

    <table border='1'>
        <thead>
        <tr>
            <th>商品コード</th>
            <th>商品名</th>
            <th>商品価格</th>
            <th>個数</th>
            <th>商品詳細</th>
            <th>備考</th>
            <th>消費税</th>
            <th>小計</th>
        </tr>
        </thead>

        <tbody>
        @foreach($carts as $cart)
            <tr>
                <td>{{ $cart->id }} </td>
                <td>{{ $cart->name }} </td>
                <td>{{ $cart->price }} </td>
                <td>{{ $cart->qty }} </td>
                <td>{{ $cart->options->product_detail }} </td>
                <td>{{ $cart->options->product_remarks }} </td>
                <td>{{ $cart->tax * $cart->qty }} </td>
                <td>{{ $cart->subtotal  }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    合計金額 {{ Cart::total() }}円<br><br>


    {!! link_to('product', '買い物を続ける', ['class' => 'btn btn-primary']) !!}
    <button>購入</button>
    {!! link_to('cart/reset', 'カートクリア', ['class' => 'btn btn-primary']) !!}
@endsection