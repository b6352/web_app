<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BuyController extends Controller
{
    public function confirm()
    {
        $cart_items = request()->session()->get("CART", []);

        $total_price = 0;
        foreach ($cart_items as $item) {
            $a = $item->product_price;
            intval($a);
            $total_price += $a;
        }

        $user = Auth::user();

        return view('/confirm')->with(compact('cart_items','total_price','user'));
    }

    public function address()
    {

        return view('/address');
    }

    public function edit(Request $request)
    {
        $messages = [
            'required' => '入力が必須です。',
            'regex' => '(数字3文字)-(数字4文字)で入力してください',
            'min' => '最低1文字です。',
            'max' => '最高50文字です。'
        ];

        $validator = validator::make($request->all(),[
            'zip' => 'required|regex:/^\d{3}\-\d{4}$/',
            'address' => 'required|min:1|max:50'
        ],$messages);

        if ($validator->fails()) {
            return redirect('/address')
                ->withErrors($validator)
                ->withInput();
        }else {
            $user = Auth::user();
            $user->zip = $request->zip;
            $user->address = $request->address;
            $user->save();
        }
        return redirect('confirm')->with(compact('user'))->with('success', '住所を変更しました。');
    }

    public function buy()
    {
        request()->session()->forget("CART");

        return view('buy');
    }

}
