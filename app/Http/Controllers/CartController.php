<?php

namespace App\Http\Controllers;

use App\Product;
use \Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //カートの中身を見る
    public function view()
    {
        $cartItems = request()->session()->get("CART",[]);
        return view('cart.index')->with(compact('cartItems'));
    }

    //カートに商品を追加
    public function add($product_id)
    {

        $items = Product::where('id',[$product_id])->first();
        if($items){
            $cartItems = request()->session()->get("CART",[]);
            $cartItems[] = $items;
            request()->session()->put("CART",$cartItems);
        }else{
            return abort(404);
        }
        $cartItems = request()->session()->get("CART",[]);
        return view('cart.index')->with(compact('cartItems'));

    }

    //カートリセット
    public function reset()
    {
        request()->session()->forget("CART");

        return redirect('home'); // 商品一覧に戻る
    }
}