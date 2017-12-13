<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //カートの中身を見る
    public function view()
    {
        $cart_items = request()->session()->get("CART", []);

        $total_price = 0;
        foreach ($cart_items as $item) {
            $a = $item->product_price;
            intval($a);
            $total_price += $a;
        }

        return view('cart.index')->with(compact('cart_items','total_price'));
    }

    //カートに商品を追加
    public function add($product_id)
    {

        $items = Product::where('id',[$product_id])->first();
        if($items){
            $cart_items = request()->session()->get("CART",[]);
            $cart_items[] = $items;
            request()->session()->put("CART",$cart_items);
        }else{
            return abort(404);
        }
        $cart_items = request()->session()->get("CART",[]);

        $total_price = 0;
        foreach ($cart_items as $item) {
            $a = $item->product_price;
            intval($a);
            $total_price += $a;
        }

        return view('cart.index')->with(compact('cart_items','total_price'));

    }

    //カートリセット
    public function reset()
    {
        request()->session()->forget("CART");

        return redirect('cart/index')->with('success','カートの中身をすべて削除しました。'); // 商品一覧に戻る
    }

    //カート指定削除
    public function delete($index)
    {
        $cart_items = request()->session()->get("CART",[]);
        $name = $cart_items[$index]->product_name;
        unset($cart_items[$index]);
        $cart_items = array_values($cart_items);
        request()->session()->put("CART",$cart_items);
        $cart_items = request()->session()->get("CART",[]);

        return redirect('cart/index')->with(compact('cart_items'))->with('success','カートから'.$name.'を削除しました。'); // 商品一覧に戻る
    }
}