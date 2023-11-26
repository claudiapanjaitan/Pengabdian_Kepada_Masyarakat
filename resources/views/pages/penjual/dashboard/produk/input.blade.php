<div class="main-content">
    <section class="section">
        <div id="content_list">
            <div class="section-header">
                <h1>Tambah / Edit Produk</h1>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="form_submit" class="needs-validation" >
                                <div class="card-header">
                                    <h4>Tambah / Edit Produk</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Nama Produk</label>
                                            <input type="text" name="nama" id="produk_nama" class="form-control" value="{{ $produk->nama }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Gambar Produk</label>
                                            <div class="custom-file">
                                                <input type="file" name="gambar" class="form-control" id="produk_gambar">
                                            </div>
        
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Harga Produk</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input type="text" name="harga" id="produk_harga" class="form-control currency" value="{{ $produk->harga }}">
                                            </div>
        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kuantitas/Stok</label>
                                            <input type="text" name="kuantitas" id="produk_kuantitas" class="form-control" value="{{ $produk->kuantitas }}">
        
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Berat</label>
                                            <input type="text" name="berat" id="produk_berat" class="form-control" value="{{ $produk->berat }}">
        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Warna</label>
                                            <input type="text" name="warna" id="produk_warna" class="form-control" value="{{ $produk->warna }}">
        
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Produk Terbaik</label>
                                            <div class="controls">
                                                <select id="produk_terbaik" name="terbaik" class="form-control">
                                                    <option value="1" {{$produk->terbaik == 1 ? 'selected' : ''}}>Terbaik</option>
                                                    <option value="0" {{$produk->terbaik == 0 ? 'selected' : ''}}>Tidak Terbaik</option>
                                                </select>
                                            </div>
        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kategori</label>
                                            <div class="controls">
                                                <select name="kategori" class="form-control">
                                                   @foreach ($category as $kategori)
                                                        <option value="{{$kategori->id}}" {{$kategori->id == $produk->terbaik ? 'selected' : ''}}>{{$kategori->kategori_nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
        
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Status</label>
                                            <div class="controls">
                                                <select id="produk_status" name="status" class="form-control">
                                                    <option value="1" {{$produk->status == 1 ? 'selected' : ''}}>Published</option>
                                                    <option value="0" {{$produk->status == 0 ? 'selected' : ''}}>UnPublished</option>
                                                </select>
                                            </div>
        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Deskripsi Pendek</label>
                                            <textarea name="deskripsi_pendek" class="form-control summernote-simple" >{{ $produk->deskripsi_pendek }}</textarea>
        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Deskripsi Panjang</label>
                                            <textarea name="deskripsi_panjang" class="form-control summernote-simple">{{ $produk->deskripsi_panjang }}</textarea>
        
                                        </div>
                                    </div>
                                </div>
        
                                <div class="card-footer text-right">
                                    <button type="button" onclick="load_list(1);" class="btn btn-secondary">Kembali</button>
                                    @if ($produk->id)
                                    <button type="submit" id="kt_ecommerce_add_product_submit"  onclick="handle_upload('#kt_ecommerce_add_product_submit','#form_submit','{{route('penjual.produk.update',$produk->id)}}','PATCH');" class="btn btn-primary">
                                        <span class="indicator-label">Simpan</span>
                                    </button>
                                    @else
                                        <button type="submit" id="kt_ecommerce_add_product_submit"  onclick="handle_upload('#kt_ecommerce_add_product_submit','#form_submit','{{route('penjual.produk.store')}}','POST');" class="btn btn-primary">
                                            <span class="indicator-label">Simpan</span>
                                        </button>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div id="list_result"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>