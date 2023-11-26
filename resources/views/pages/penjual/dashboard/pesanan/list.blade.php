@if(count($orders) > 0)
<div class="card-body">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jumlah Item</th>
                <th scope="col">Jumlah Harga</th>
                <th scope="col">Order Status</th>
                <th scope="col">Pembayaran Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $i => $order)
                <tr>
                    <th scope="col">
                       {{$orders->firstItem() + $i}}
                    </th>
                    <th scope="col">
                        <a href="{{route('penjual.pesanan.show',$order->id)}}">{{'#' . $order->order_number}}</a>
                    </th>
                    <td>{{$order->user->nama_lengkap}}</td>
                    <td>
                        {{ ($order->order_date) }}
                    </td>
                    <td>
                        {{ $order->total_items }}
                    </td>
                    <td>
                        Rp {{number_format($order->total_price) }}
                    </td>

                    @if($order->pesanan_status == 0)
                        <td>Belum di proses</td>
                    @elseif($order->pesanan_status == 1)
                        <td>Sedang di proses</td>
                    @elseif($order->pesanan_status == 2)
                        <td>Sudah diproses</td>
                    @elseif($order->pesanan_status == 3)
                        <td>Sedang dikirim</td>
                    @elseif($order->pesanan_status == 4)
                        <td>Selesai</td>
                    @endif
                    @if($order->order_status == 'pending')
                        <td>Belum dibayar</td>
                    @elseif($order->order_status == 'settlement')
                        <td>Lunas</td>
                    @elseif($order->order_status == 'cancel')
                        <td>Dibatalkan</td>
                    @elseif($order->order_status == 'failure')
                        <td>Gagal</td>
                    @else
                        <td>Belum dibayar</td>
                    @endif

                    <td>
                        <a href="{{route('penjual.pesanan.show',$order->id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                        <a href="javascript:;" class="btn btn-sm btn-primary" onclick="load_input('{{route('penjual.pesanan.edit',$order->id)}}');">
                            <span class="">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                    Edit
                                </button>
                            </span>
                        </a>
                        {{-- <a href="javascript:;" onclick="handle_confirm('{{route('penjual.pesanan.update',$order->id)}}');">
                            <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                                <button class="btn btn-success">Pembayaran Selesai</button>
                            </span>
                        </a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{$orders->links('vendor.pagination.bootstrap-4')}}
@else
<div class="card-body">
    <div class="row">
        <div class="col-md-8">
            <div class="alert alert-primary">
                Belum ada data pesanan pembeli
            </div>
        </div>
    </div>
</div>
@endif