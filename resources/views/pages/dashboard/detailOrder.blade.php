<x-UserDashboard-Layout title="Detail">
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Pesanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>

                @if($data->courier == "cod")
                    @if($data->pesanan_status != "4")
                    <h2 class="title">COD (Cash of Delivery)</h2>
                    <p>Pesanan ini menggunakan metode COD (Cash of Delivery). Silakan menghubungi penjual melalui WhatsApp dengan cara </h2>
                        <hr>
                        <hr>
                    @endif
                @endif
                @if($data->pesanan_status == 3)
                    <div class="alert alert-info">Jika pesanan telah sampai tujuan, silakan tekan tombol dibawah</div>
                    <a href="user/finish_transaction?invoice={{$data->order_number}}&resi={{$data->resi}}" class="btn btn-sm btn-secondary" onclick="return confirm('Yakin sudah sampai?');">Sudah Sampai & Selesai</a>

                @elseif ($data->order_status == "")
                    <div class="alert alert-info">Kamu belum memilih metode pembayaran. Silakan klik tombol dibawah untuk memilih metode pembayaran yang diinginkan.</div>
                    <button id="pay-button" class="btn btn-sm btn-secondary">Pilih Metode Pembayaran</button>
                    <hr>
                @elseif($data->order_status == "pending")
                    <div class="alert alert-info">Kamu belum melakukan pembayaran. Klik tombol dibawah untuk melihat panduan pembayaran. (batas maksimal pembayaran 1x24jam)</div>
                    <a href="{{$data->link_pay}}" target="_blank" class="btn btn-sm btn-secondary">Panduan Pembayaran</a>
                    <hr>
                @endif
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h5 class="card-heading">Data Order</h5>
                                </div>
                                <div class="card-body p-0">

                                    <table class="table table-hover table-striped table-hover">
                                        <tr>
                                            <td>Nomor</td>
                                            <td><b>#{{$data->order_number}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td><b>{{$data->order_date}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Item</td>
                                            <td><b>{{$data->total_items}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td><b>Rp {{number_format($data->total_price)}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Metode pembayaran</td>
                                            <td><b>{{ $data->payment_method == 1 ? 'Transfer bank' : 'Bayar ditempat' }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td><b>
                                                    @if($data->order_status == 'pending' || $data->order_status == '')
                                                        Belum dibayar
                                                    @elseif ($data->order_status == 'settlement' && $data->pesanan_status == 0)
                                                        Menunggu konfirmasi
                                                    @elseif ($data->pesanan_status == 1)
                                                        Sudah dikonfirmasi
                                                    @elseif ($data->pesanan_status == 2)
                                                        Sedang diproses
                                                    @elseif ($data->pesanan_status == 3) 
                                                        Sedang dikirim
                                                    @elseif ($data->pesanan_status == 4)
                                                        Selesai
                                                    @endif
                                                </b></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Resi</td>
                                            <td>{{$data->resi}}</b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h5 class="card-heading">Barang dalam pesanan</h5>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-hover table-condensed">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Produk</th>
                                            <th scope="col">Jumlah beli</th>
                                            <th scope="col">Harga total</th>
                                        </tr>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>
                                                    <img style="width: 30%;" src="{{$item->image}}" alt="{{$item->image}}">
                                                </td>
                                                <td>
                                                    <h5 class="mb-0">{{$item->produk->nama}}</h5>
                                                </td>
                                                <td><b>{{$item->order_qty}}</td>
                                                <td>Rp {{number_format($item->order_price * $item->order_qty)}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h5 class="card-heading">Data Penerima</h5>
                                </div>
                                @if($delivery_data)
                                <div class="card-body p-0">
                                    <table class="table table-hover table-striped table-hover">
                                        <tr>
                                            <td>Nama</td>
                                            <td><b>{{$delivery_data->user->nama_lengkap}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>No. HP</td>
                                            <td><b>{{$delivery_data->user->notelp}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><b>{{$delivery_data->user->alamat}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Catatan</td>
                                            <td><b>{{$delivery_data->note}}</b></td>
                                        </tr>
                                    </table>
                                </div>
                                @endif
                            </div>
                            <div class="card card-primary" style="margin-top: 270px;">
                                <div class="card-header">
                                    <h5 class="card-heading">Status Pesanan</h5>
                                </div>
                                <div class="card-body p-0">
                                    @if ($data->payment_price == NULL)
                                        <div class="alert alert-info m-2">Tidak ada data pembayaran.</div>
                                    @else
                                        <table class="table table-hover table-striped table-hover">
                                            <tr>
                                                <td>Transfer</td>
                                                <td><b>Rp {{ number_format($data->payment_price)}}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td><b>{{$data->payment_date}}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                            </tr>
                                        </table>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-body">
                            <p>Apabila mau Mengecek Resi dapat mengklik link dibawah ini :</p>
                            <a href="https://rajaongkir.com/">Klik Disini</a>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</x-UserDashboard-Layout>