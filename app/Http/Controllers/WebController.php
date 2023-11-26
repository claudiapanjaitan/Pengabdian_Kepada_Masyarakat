<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class WebController extends Controller
{
    public function home(){
        $produk = new Produk;
        $best_products = $produk->get_all_best_products();
        $list_products = $produk->get_all_list_products();
        return view('pages.home',compact('best_products','list_products'));
    }
}
