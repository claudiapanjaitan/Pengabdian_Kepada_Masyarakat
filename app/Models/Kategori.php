<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

    public $table = 'kategori';

    public function get_all_best_products(){
        $this->join('kategori','kategori.id=produk.produk_kategori')
        ->where('produk.produk_status', 1)
        ->where('produk_terbaik', 1)
        ->orderBy('produk.produk_id', 'ASC')
        ->get();
    }

    public function get_all_list_products()
    {
        $this->join('kategori', 'kategori.id=produk.produk_kategori')
        ->order_by('produk.produk_id', 'ASC')
        ->where('produk.produk_status', 1)
        ->get();
    }

    public function getImageAttribute()
    {
        return asset('storage/' . $this->photo);
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'categories_id','id');
    }
    public function review()
    {
        return $this->hasMany(OrderRate::class,'product_id','id');
    }
}