<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderItem extends Model
{
    public $table = 'orders_item';
    public function order_items($id){
        return OrderItem::select('orders_item.*','produk.*')
        ->join('produk','produk.id','=','orders_item.produk_id')
        ->where('orders_item.order_id',$id)
        ->get();
    }

    public function getProductByInvoice($id){
        $user = Auth::user()->id;
        return OrderItem::
        select('orders_item.*','orders.*')
        ->join('orders','orders.id','=','orders_item.order_id')
        ->where('orders_item.id', $id)
        ->where('orders.user_id', $user)
        ->first(); 
    }

    public function produk(){
        return $this->belongsTo(Produk::class,'produk_id','id');
    }
}