<div class="card-body {{ count($orders) > 0 ? ' p-0' : '' ; }}">
    @if(count($orders) > 0)
        <table class=" table table-borderless">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID Pesanan</th>
                    <th scope="col">Jumlah Pesanan</th>
                    <th scope="col">Total Pesanan</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Tanggal Pesanan</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $i => $order)
                    <tr>
                        <td>{{ $orders->firstItem() + $i}}</td>
                        <td><a href="{{route('user.order_view', $order->id)}}">{{'#' . $order->order_number }}</a></td>
                        <td>{{ $order->total_items; }} barang</td>
                        <td>Rp {{number_format($order->total_price); }}</td>
                        <td>{{ ($order->payment_method == 1) ? 'Transfer bank' : 'Bayar ditempat'; }}</td>
                        @php
                            setlocale(LC_TIME, 'ID_id');
                        @endphp
                        <td>{{ \Carbon\Carbon::parse($order->order_date)->diffForHumans()}} <br> {{\Carbon\Carbon::parse($order->order_date)->formatLocalized('%A %d %B %Y')}} <br> {{\Carbon\Carbon::parse($order->order_date)->formatLocalized('%H:%M:%S')}}</td>
                        @if($order->order_status == 'pending' || $order->order_status == "")
                            <td>Belum dibayar</td>
                        @elseif($order->pesanan_status == 0 && $order->order_status == 'settlement')
                            <td>Menunggu konfirmasi</td>
                        @elseif($order->pesanan_status == 1)
                            <td>Sudah dikonfirmasi</td>
                        @elseif($order->pesanan_status == 2)
                            <td>Sedang diproses</td>
                        @elseif ($order->pesanan_status == 3)
                            <td>Sedang dikirim</td>
                        @elseif ($order->pesanan_status == 4)
                            <td>
                                Selesai
                                <br>
                                @if($order->order_review->count() < 1)
                                <a href="{{route('user.ulasan.create',$order->id)}}" class="btn btn-sm btn-primary">
                                    <span class="">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                            </svg>
                                            Ulas
                                        </button>
                                    </span>
                                </a>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-info">
                    Belum ada data order.
                </div>
            </div>
        </div>
    @endif
    {{$orders->links('vendor.pagination.bootstrap-4')}}
</div>