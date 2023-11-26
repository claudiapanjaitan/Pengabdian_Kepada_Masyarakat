<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UlasanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->ajax() ){
        //     $produk = Ulasan::where('user_id', Auth::user()->id)->paginate(10);
        //     return view('pages.penjual.dashboard.produk.list', compact('produk'));
        // }
        // return view('pages.penjual.dashboard.produk.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order_id = '';
        foreach($_GET as $key => $value){
            $order_id = $key;
        }
        $order = Orders::where('id', $order_id)->first();
        $orderItem = OrderItem::where('order_id',$order_id)->get();
        return view('pages.user.ulasan.input', ['data' => new Ulasan, 'orderItem' => $orderItem, 'order' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'isi_ulasan' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('isi_ulasan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('isi_ulasan'),
                ]);
            }
        }
        $order = Orders::where('id', $request->order_id)->first();
        $orderItem = OrderItem::where('order_id', $request->order_id)->get(); 
        foreach($orderItem as $item){
            $ulasan = new Ulasan;
            $ulasan->id_produk = $item->produk_id;
            $ulasan->id_user = Auth::user()->id;
            $ulasan->nama_lengkap = Auth::user()->nama_lengkap;
            $ulasan->email = Auth::user()->email;
            $ulasan->isi_ulasan = $request->isi_ulasan;
            $ulasan->tanggal = date('Y-m-d');
            $ulasan->id_order = $order->id;
            $ulasan->save();
        }
        return response()->json([
            'alert' => 'success',
            'message' => 'Ulasan Berhasil Ditambahkan',
            'redirect' => route('user.order'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        
    }
}
