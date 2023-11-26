<div class="main-content">
    <section class="section">
        <div id="content_list">
            <div class="section-header">
                <h1>Edit Pesanan</h1>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="form_submit" class="needs-validation" >
                                <div class="card-header">
                                    <h4>Edit Pesanan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Resi</label>
                                            <input type="text" name="resi" id="resi" class="form-control" value="{{ $data->resi }}">
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Foto Resi</label>
                                            <div class="custom-file">
                                                <input type="file" name="foto_resi" class="form-control" id="foto_resi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="0"{{$data->pesanan_status == 0 ? 'selected' : ''}}>Belum di proses</option>
                                                <option value="1"{{$data->pesanan_status == 1 ? 'selected' : ''}}>Sedang di proses</option>
                                                <option value="2"{{$data->pesanan_status == 2 ? 'selected' : ''}}>Sudah di proses</option>
                                                <option value="3"{{$data->pesanan_status == 3 ? 'selected' : ''}}>Sedang dikirim</option>
                                                <option value="4"{{$data->pesanan_status == 4 ? 'selected' : ''}}>Selesai</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="card-footer text-right">
                                    <button type="button" onclick="load_list(1);" class="btn btn-secondary">Kembali</button>
                                    <button type="submit" id="kt_ecommerce_add_product_submit"  onclick="handle_upload('#kt_ecommerce_add_product_submit','#form_submit','{{route('penjual.pesanan.update',$data->id)}}','PATCH');" class="btn btn-primary">
                                        <span class="indicator-label">Simpan</span>
                                    </button>
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