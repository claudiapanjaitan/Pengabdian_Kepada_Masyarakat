<x-UserDashboard-Layout title="Ulasan">
    <div class="main-content">
    <section class="section">
        <div id="content_list">
            <div class="section-header">
                <h1>Tambah Ulasan</h1>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="form_submit" class="needs-validation" >
                                <div class="card-header">
                                    <h4>Tambah Ulasan</h4>
                                </div>
                                <input type="hidden" name="order_id" id="" value="{{$order->id}}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Isi Ulasan</label>
                                            <textarea name="isi_ulasan" id="isi_ulasan" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="button" onclick="load_list(1);" class="btn btn-secondary">Kembali</button>
                                        <button type="submit" id="kt_ecommerce_add_product_submit"  onclick="handle_upload('#kt_ecommerce_add_product_submit','#form_submit','{{route('user.ulasan.store')}}','POST');" class="btn btn-primary">
                                            <span class="indicator-label">Simpan</span>
                                        </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</x-UserDashboard-Layout>