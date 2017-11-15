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
            'digits' => '数字7字で入力してください'
        ];

        $validator = validator::make($request->all(),[
            'zip' => 'required|digits:7',
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

}
