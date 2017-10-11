<?php

namespace App\Http\Controllers;

use App\Product;
use \Cart;

class CartController extends Controller
{
    //カートに商品を追加する
    public function add($product_id, $buy_num)
    {

        //購入した商品情報を取得
        $product = Product::findOrFail($product_id);

        // カートをクリア
        //Cart::destroy();

        // 商品ID, 商品名, 個数, 値段, 詳細情報
        Cart::add([
            [
                'id' => $product->product_code,
                'name' => $product->product_name,
                'qty' => $buy_num,
                'price' => $product->product_price,
                'options' => ['product_detail' => $product->product_detail]
            ]
        ]);

        // カートの中身を返す
        $carts = Cart::content();
        return view('cart.index')->with(compact('carts'));
    }

    //カートをリセット
    public function reset()
    {

        Cart::destroy();
        return redirect('home'); // 商品一覧に戻る
    }
}