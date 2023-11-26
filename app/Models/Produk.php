<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    public $table = 'produk';
    public $timestamps = false;

    public function get_all_best_products(){
        return Produk::select('produk.*')
        ->join('kategori','kategori.id','=','produk.kategori')
        ->where('produk.status', 1)
        ->where('terbaik', 1)
        ->orderBy('produk.id', 'ASC')
        ->get();
    }

    public function get_all_list_products()
    {
        return Produk::select('produk.*')
        ->join('kategori', 'kategori.id','=','produk.kategori')
        ->orderBy('produk.id', 'ASC')
        ->where('produk.status', 1)
        ->get();
    }

    public function getImageAttribute()
    {
        return asset('storage/'. $this->gambar);
    }

    public function order(){
        return $this->belongsTo(OrderItem::class,'id','produk_id');
    }
    public function category()
    {
        return $this->belongsTo(Kategori::class,'kategori','id');
    }
    public function penjual(){
        return $this->belongsTo(Penjual::class, 'user_id','id');
    }
    public function review()
    {
        return $this->hasMany(OrderRate::class,'product_id','id');
    }
}