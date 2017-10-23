@extends('layouts.app')

@section('content')
<div class="container">
    カートの内容

    @if($cartItems !== NULL)
        <?php $total_price = 0; ?>
        @foreach($cartItems as $item)
            <br>
            {{$item->product_name}}
            {{$item->product_price}}円
            {{$item->product_detail}}
            <br>
            <?php
                $a = $item->product_price;
                intval($a);
                $total_price += $a;
            ?>
        @endforeach
        合計{{$total_price}}円
    @endif

    {!! link_to('home', '買い物を続ける', ['class' => 'btn btn-primary']) !!}
    <button>購入</button>
    {!! link_to('cart/reset', 'カートクリア', ['class' => 'btn btn-primary']) !!}
</div>
@endsection