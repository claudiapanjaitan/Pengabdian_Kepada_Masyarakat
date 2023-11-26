<?php

namespace App\Http\Controllers\Penjual;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax() ){
            $produk = Produk::where('user_id', Auth::guard('penjual')->user()->id)->paginate(10);
            return view('pages.penjual.dashboard.produk.list', compact('produk'));
        }
        return view('pages.penjual.dashboard.produk.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Kategori::get();
        return view('pages.penjual.dashboard.produk.input', ['produk' => new Produk, 'category' => $category]);
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
            'nama' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'harga' => 'required',
            'kuantitas' => 'required',
            'berat' => 'required',
            'warna' => 'required',
            'terbaik' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'deskripsi_pendek' => 'required',
            'deskripsi_panjang' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            } elseif ($errors->has('gambar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('gambar'),
                ]);
            } elseif ($errors->has('harga')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('harga'),
                ]);
            } elseif ($errors->has('kuantitas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kuantitas'),
                ]);
            } elseif ($errors->has('berat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('berat'),
                ]);
            } elseif ($errors->has('warna')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('warna'),
                ]);
            } elseif ($errors->has('terbaik')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('terbaik'),
                ]);
            } elseif ($errors->has('kategori')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kategori'),
                ]);
            } elseif ($errors->has('status')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('status'),
                ]);
            } elseif ($errors->has('deskripsi_pendek')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi_pendek'),
                ]);
            } elseif ($errors->has('deskripsi_panjang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi_panjang'),
                ]);
            } 
        }
        
        $file = request()->file('gambar')->store("produk");
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->gambar = $file;
        $produk->harga = $request->harga;
        $produk->kuantitas = $request->kuantitas;
        $produk->berat = $request->berat;
        $produk->warna = $request->warna;
        $produk->terbaik = $request->terbaik;
        $produk->kategori = $request->kategori;
        $produk->status = $request->status;
        $produk->deskripsi_pendek = $request->deskripsi_pendek;
        $produk->deskripsi_panjang = $request->deskripsi_panjang;
        $produk->produk_date = date('Y-m-d');
        $produk->user_id = auth()->guard('penjual')->user()->id;
        $produk->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Produk '.$request->nama.' Berhasil Ditambahkan',
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
        $row = Ulasan::where('id_produk',$produk->id)->get();
        return view('pages.user.product.show', compact('produk','row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $category = Kategori::get();
        return view('pages.penjual.dashboard.produk.input', ['produk' => $produk, 'category' => $category]);
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'harga' => 'required',
            'kuantitas' => 'required',
            'berat' => 'required',
            'warna' => 'required',
            'terbaik' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'deskripsi_pendek' => 'required',
            'deskripsi_panjang' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }  elseif ($errors->has('harga')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('harga'),
                ]);
            } elseif ($errors->has('kuantitas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kuantitas'),
                ]);
            } elseif ($errors->has('berat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('berat'),
                ]);
            } elseif ($errors->has('warna')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('warna'),
                ]);
            } elseif ($errors->has('terbaik')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('terbaik'),
                ]);
            } elseif ($errors->has('kategori')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kategori'),
                ]);
            } elseif ($errors->has('status')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('status'),
                ]);
            } elseif ($errors->has('deskripsi_pendek')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi_pendek'),
                ]);
            } elseif ($errors->has('deskripsi_panjang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi_panjang'),
                ]);
            } 
        }
        
        if($request->hasFile('gambar')){
            $file = request()->file('gambar')->store("produk");
            $produk->gambar = $file;
        }
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->kuantitas = $request->kuantitas;
        $produk->berat = $request->berat;
        $produk->warna = $request->warna;
        $produk->terbaik = $request->terbaik;
        $produk->kategori = $request->kategori;
        $produk->status = $request->status;
        $produk->deskripsi_pendek = $request->deskripsi_pendek;
        $produk->deskripsi_panjang = $request->deskripsi_panjang;
        $produk->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Produk '.$request->nama.' Berhasil Diperbaharui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        Storage::delete($produk->gambar);
        return response()->json([
            'alert' => 'success',
            'message' => 'Produk Berhasil dihapus',
        ]);
    }

    public function published(Produk $produk)
    {
        $produk->status = 1;
        $produk->update();
        return response()->json([
            'alert'=>'success',
            'message'=>'Produk Berhasil Di Publish',
        ]);
    }

    public function unpublished(Produk $produk)
    {
        $produk->status = 0;
        $produk->update();
        return response()->json([
            'alert'=>'success',
            'message'=>'Produk Berhasil Di Unpublish'
        ]);
    }
}
