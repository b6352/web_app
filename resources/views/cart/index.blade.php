@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-11">
        カートの中身
        <?php $total_price = 0; ?>
        @foreach($cartItems as $item)
            {{$item->product_price}}
            <?php
            $a = $item->product_price;
            intval($a);
            $total_price += $a;
            ?>
        @endforeach
        @if($total_price===0)
            はありません
        @endif
        @if($total_price!==0)
            <br>
            <?php
            $total_price = 0;
            $index = 1;
            ?>
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
                @foreach($cartItems as $item)
                <tr>
                    <th><img src="/../image/{{$item->product_image}}.jpg"/></th>
                    <th>{{$item->product_name}}</th>
                    <th>{{number_format($item->product_price)}}円</th>
                    <th>{{$item->product_detail}}</th>
                    <th>{!! link_to(action('CartController@delete', ['index' => $index]),"削除") !!}
                    </th>
                </tr>
                <?php
                $index++;
                $a = $item->product_price;
                intval($a);
                $total_price += $a;
                ?>
                @endforeach
                </tbody>
            </table>
            @if($total_price!==0)
                <br>
                合計{{$total_price}}円
            @endif
        @endif
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1">
        {!! link_to('home', '買い物を続ける', ['class' => 'btn btn-primary']) !!}
        <br>
        <br>
        @if($total_price!==0)
            <button>購入</button>
            <br>
            <br>
            {!! link_to('cart/reset', 'カートクリア', ['class' => 'btn btn-primary']) !!}
        @endif
    </div>
</div>
@endsection