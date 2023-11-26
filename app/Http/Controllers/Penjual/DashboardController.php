<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dataproduk(Request $request){
        if($request->ajax() ){
            $produk = Produk::where('user_id', Auth::guard('penjual')->user()->id)->paginate(5);
            return view('pages.penjual.dashboard.produk.list', compact('produk'));
        }
        return view('pages.penjual.dashboard.produk.main');
    }
    
    public function datapembayaran(){
        return view('pages.penjual.dashboard.datapembayaran');
    }
}
