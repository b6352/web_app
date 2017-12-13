@extends('layouts.app')
@section('cart_view')
    <li><a href="cart/index">カートの中身を見る</a></li>
@endsection
@section('content')
    <div class="container">
        <div class="tab-content tab_content_style">
            @foreach($products as $product)
                @if($product->id%3==0)<div class="row row-eq-height">@endif
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="product_list">
                            <div class="product_details">
                                <h4>{{$product->product_name}}</h4>
                                <img src="image/{{$product->product_image}}.jpg" alt="" />
                                <h6>税抜き{{number_format($product->product_price)}}円</h6>
                                <h6>{{$product->product_detail}}</h6>
                                <h6>{!! link_to(action('CartController@add', ['id' => $product->id]), "カートに追加") !!}</h6>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                @if($product->id%3==0)</div>@endif
            @endforeach
        </div>
    </div>
@endsection

<style>
    .row-eq-height {
        display: flex;
        flex-wrap: wrap;
    }
    .product_details{
        white-space: nowrap;
    }
</style>