<x-User-Layout title="Cart">
    <!--================Checkout Area =================-->
    <section class="checkout_area section-margin--small">
        <div class="container">
            <form action="{{route('user.checkout.store', $id)}}" method="POST">
                @csrf
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Alamat Penerima</h3>
                            {{-- {{dd($get['rajaongkir']['results'])}} --}}
                            <div class="col-md-12 form-group p_star">
                                <input type="hidden" class="form-control" id="biayaongkir" name="biayaongkir" value="">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <span>Pembayaran Dapat dilakukan melalui : BCA (08136219414) </span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Penerima" value="{{Auth::user()->nama_lengkap}}">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control" id="notelp" name="notelp" placeholder="No HP" value="{{Auth::user()->notelp}}">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Rumah" value="{{Auth::user()->alamat}}">
                            </div>
                            <div class="col-md-12 form-group mb-0">
                                <label>Catatan</label>
                                <textarea class="form-control" name="note" id="note" rows="1" placeholder="Order Notes"></textarea>
                            </div>
                            </br>

                            <div class="col-md-12 form-group p_star">
                                <label>Pilih Provinsi</label>
                                <div class="controls">
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option>Pilih Provinsi</option>
                                        @for ($i = 0; $i < count($get['rajaongkir']['results']); $i++)
                                            <option value="{{ $get['rajaongkir']['results'][$i]['province_id'] }}">{{$get['rajaongkir']['results'][$i]['province']}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Pilih Kabupaten/Kota</label>
                                <div class="controls">
                                    <select id="kabupaten" name="kabupaten" class="form-control">
                                        <option>Pilih Kabupaten</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Pilih Kurir</label>
                                <div class="controls">
                                    <select class="form-control" id="kurir" name="kurir">
                                        <option value="">Pilih Kurir</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS INDONESIA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label>Pilih Layanan</label>
                                <div id="tampil_ongkir">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Pilih Layanan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 form-group p_star">
                                <div class="text-center">
                                    <button type="submit" class="button button-paypal" style="font-size: 16px; margin-top: 30px;">Buat Pesanan</button>
                                </div>
                            </div>

                            <input type="hidden" name="id" id="" value="{{$id}}">
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Detail Belanja</h2>
                                <ul class="list" style="line-height: 0px;">
                                    <li>
                                        <a href="#">
                                            <h4>Produk <span>Total</span></h4>
                                        </a>
                                    </li>
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    @foreach (\Cart::getContent() as $i=> $cart_items)
                                    @php
                                        $subtotal += $cart_items['quantity'] *$cart_items['price'];
                                    @endphp
                                        <li>
                                            <div class="col-md-12 form-group p_star">
                                                <input type="hidden" class="form-control" id="product_name" name="product_name" value="{{$cart_items['name'] }}">
                                            </div>
                                            <a href="#">{{$cart_items['name']}}
                                                <span class="last" style="margin-left: 20px;">x {{$cart_items['quantity']}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="list list_2" style="line-height: 0px;">
                                    <li><a href="#" id="subtotal" name="subtotal" value="">Sub Total <span>Rp 
                                        {{number_format($subtotal)}}
                                    </span></a></li>
                                    <input type="hidden" name="subtotal_inp" id="subtotal_inp" value="{{$subtotal}}">
                                    <li><a href="#" id="ongkir" name="ongkir" value="">Biaya Pengiriman <span>Rp </span>
                                        </a></li>
                                    <li><a href="#" id="total" name="total" value="">Total <span></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--================End Checkout Area =================-->
    <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; 2022 <div class="bullet"></div> Develop By <a href="#">Kelompok 15
                TA</a>
        </div>
        <div class="footer-right">
            2.3.0
        </div>
    </footer>
    </div>
    @section('custom_js')
    <script>
        $('#provinsi').change(function() {

            //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
            var prov = $('#provinsi').val();
            var nama_provinsi = $(this).attr("nama_provinsi");
            $.ajax({
                type: 'GET',
                url: "{{route('provinsi.get_kabupaten')}}",
                data: {
                    'prov_id' : prov,
                    'subtotal': {{$subtotal}}
                },
                success: function(data) {
                    //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                    $("#kabupaten").html(data);
                }
            });
        });


        $('#kurir').change(function() {

            //Mengambil value dari option select provinsi asal, kabupaten, kurir kemudian parameternya dikirim menggunakan ajax
            var kab = $('#kabupaten').val(),
            kurir = $('#kurir').val(),
            subtotal = $('#subtotal_inp').val();

            $.ajax({
                type: 'POST',
                url: "{{route('provinsi.get_kurir')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'kab_id': kab,
                    'kurir': kurir,
                    'subtotal' : subtotal,
                },
                success: function(data) {

                    //jika data berhasil didapatkan, tampilkan ke dalam element div tampil_ongkir
                        $("#tampil_ongkir").html(data);
                }
            });
        });
    </script>
    @endsection
</x-User-Layout>