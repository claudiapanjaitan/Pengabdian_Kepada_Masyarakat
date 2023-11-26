<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $carts = \Cart::getContent();
        return view('pages.user.cart.index', compact('carts'));
    }


    public function addToCart(Request $request)
    {
        $produk = Produk::where('id', $request->produk_id)->first();
        if($produk->kuantitas < $request->qty){
            session()->flash('error', 'Gagal Menambahkan Ke Keranjang, Stok Tidak Cukup');
            return redirect()->back()->with('error', 'Gagal Menambahkan Ke Keranjang, Stok Tidak Cukup');
        }else{
            $cart = \Cart::add([
                'id' => $request->produk_id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->qty,
                'attributes' => array(
                    'subtotal' => $request->price * $request->qty,
                    'image' => $request->image,
                )
            ]);
            session()->flash('success', 'Berhasil Menambahkan Ke Keranjang');
            return redirect()->route('cart.list')->with('success', 'Berhasil Menambahkan Ke Keranjang');
        }
    }

    public function updateCart(Request $request)
    {
        $produk = Produk::where('id', $request->id)->first();
        if($produk->kuantitas < $request->quantity){
            session()->flash('error', 'Gagal Menambahkan Ke Keranjang, Stok Tidak Cukup');
            return redirect()->back()->with('error', 'Gagal Menambahkan Ke Keranjang, Stok Tidak Cukup');
        }else{
            \Cart::update(
                $request->id,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $request->quantity
                    ],
                ]
            );
        }

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
