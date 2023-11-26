<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Orders extends Model
{

    public $table = 'orders';

    public function getImageAttribute(){
        return asset('storage/' . $this->gambar_resi);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    public function get_all_orders(){
        return Orders::where('user_id',Auth::guard('penjual')->user() ? Auth::guard('penjual')->user()->id : Auth::user()->id)
        ->orderBy('order_date','DESC')
        ->paginate(10);
    }

    public function get_all_payments(){
        return Orders::select('orders.*','payments.*','users.*')
        ->join('payments','payments.order_id','=','orders.id')
        ->join('users','users.id','=','orders.user_id')
        ->orderBy('payment_date','DESC')
        ->paginate(10);
    }

    public function order_data($id){
        return Orders::select('orders.*','payments.*','resi.*','orders_item.*')
        ->join('orders_item','orders_item.order_id', '=','orders.id')
        ->leftJoin('payments','payments.order_id', '=','orders.id')
        ->leftJoin('resi','resi.nomor', '=','orders.resi')
        ->where('orders.id', $id)
        ->first();
    }

    public function order_review(){
        return $this->hasMany(Ulasan::class, 'id_order', 'id');
    }

    public function getOrderByInvoice($id){
        $user = Auth::user()->id;
        return Orders::where('id', $id)
        ->where('user_id', $user)
        ->first(); 
    }

    public function detail(){
        return $this->hasMany(OrderItem::class,'order_id','id');
    }
    
    public function singleDetail(){
        return $this->belongsTo(OrderItem::class,'id','order_id');
    }
}