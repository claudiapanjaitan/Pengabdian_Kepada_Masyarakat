<x-UserDashboard-Layout title="Order #{{$data->order_number}}">
    @php
        $title = 'Order #' . $data->order_number;
    @endphp
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{$title}}</h1>
        </div>
        <div align="right">
            <button onclick="history.back();" class="btn btn-info">Kembali</button>
        </div>
        @if($data->courier == "cod") 
            @if ($data->pesanan_status != 4) 
                <a href="
                {{-- {{('penjual/finish_order_cod', $data->order_number)}} --}}
                " onclick="return confirm('Yakin pesanan ini sudah selesai?');" class="btn btn-success btn-sm">Selesai</a>
            @endif
       @else
            @if ($data->order_status == 'settlement' && $data->pesanan_status == 0) 
                <a href="
                {{-- {{('penjual/process_order', $data->order_number)}} --}}
                " onclick="return confirm('Yakin ingin mengubah status pesanan menjadi sedang di proses?');" class="btn btn-info btn-sm">Proses Pesanan</a>
           @elseif ($data->pesanan_status == 2) 
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#sendingOrder">Pesanan Dikirim</button>
                <a href="
                {{-- {{('penjual/sending_order', $data->order_number)}} --}}
                "></a>
           @endif
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card-wrapper">
                    <div class="card">


                        <div class="card-header">
                            <h3 class="mb-0">Data Pesanan</h3>

                        </div>

                        <div class="card-body p-0">
                            <table class="table align-items-center table-flush table-striped">
                                <tr>
                                    <td>Nomor</td>
                                    <td><b>#{{$data->order_number }}</b></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td><b>{{($data->order_date)}}</b></td>
                                </tr>
                                <tr>
                                    <td>Item</td>
                                    <td><b>{{ $data->total_items }}</b></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td><b>Rp {{number_format($data->total_price) }}</b></td>
                                </tr>
                                <tr>
                                    <td>Metode pembayaran</td>
                                    <td><b> {{ ($data->payment_method == 1) ? 'Transfer bank' : 'Bayar ditempat' }}</b></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><b class="statusField">
                                            @if ($data->pesanan_status == 4) 
                                                <b>Transaksi Selesai</b>
                                            @elseif ($data->pesanan_status == 0) 
                                                @if ($data->order_status == 'pending') 
                                                    <b>Belum dibayar</b>
                                                 @elseif ($data->order_status == 'settlement') 
                                                    <b>Sudah dibayar</b>
                                                 @elseif ($data->order_status == 'cancel') 
                                                    <b>Dibatalkan</b>
                                                 @elseif ($data->order_status == 'failure') 
                                                    <b>Gagal</b>
                                                 @else 
                                                    <b>Belum dibayar</b>
                                                    @endif 
                                            @elseif ($data->pesanan_status == 1) 
                                                <b>Sudah dibayar</b>
                                            @elseif ($data->pesanan_status == 2) 
                                                <b>Sedang dikirim</b>
                                            @elseif ($data->pesanan_status == 3) 
                                                <b>Sedang dikirim</b>
                                            @endif
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Resi : </td>
                                    @if($data->gambar_resi == null)
                                    <td><b class="statusField">-</td>
                                    @else
                                        <td><b class="statusField">{{$data->resi}}</td>
                                    @endif
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
                <br>


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="mb-0">Barang dalam pesanan</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Jumlah beli</th>
                                    <th scope="col">Harga satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>
                                            <img style="width:10%;" alt="{{ $item->produk->nama }}" src="{{$item->produk->image}}">
                                        </td>
                                        <td>
                                            <h5 class="mb-0">{{ $item->produk->nama }}</h5>
                                        </td>
                                        <td>{{ $item->order_qty }}</td>
                                        <td>Rp {{number_format($item->order_price) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="mb-0">Data Penerima</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table align-items-center table-flush table-hover">
                        <tr>
                            <td>Nama</td>
                            <td><b>{{ $delivery_data ? $delivery_data->user->nama_lengkap : '-'}}</b></td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td><b>{{ $delivery_data ? $delivery_data->user->notelp : '-'}}</b></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <div style="white-space: initial;"><b>{{ $delivery_data ? $delivery_data->user->alamat : '-'}}</b></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td><b>{{$delivery_data ? $delivery_data->note  : '-'}}</b></td>
                        </tr>
                    </table>
                </div>
            </div>


        </div>
    </section>
</div>
</x-UserDashboard-Layout>