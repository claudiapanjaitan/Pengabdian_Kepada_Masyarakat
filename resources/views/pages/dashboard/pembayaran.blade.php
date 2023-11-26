<x-UserDashboard-Layout title="Pembayaran">
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pembayaran Saya</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <div>
                    <a href="{{route('user.confirmpayment')}}" class="btn btn-success btn-lg">
                        <i class="fa fa-credit-card"></i> Bayar Pesanan
                    </a>
                </div>
                <div class="card">
                    <div class="card-body {{ count($payments) > 0 ? ' p-0' : ''}}">
                        @if(count($payments) > 0)
                            <table class=" table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Order</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{$payment->id}}</td>
                                            <td><?php // anchor('user/pembayaran_view/' . $payment->id, '#' . $payment->order_number); ?></td>
                                            <td><?php // get_formatted_date($payment->payment_date); ?></td>
                                            <td><?php // get_payment_status($payment->payment_status); ?></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="alert alert-info">
                                        Belum ada data pembayaran
                                    </div>

                                    <?php // anchor('customer/payments/confirm', 'Konfirmasi pembayaran baru'); ?>
                                </div>
                            </div>
                        @endif

                    </div>
                    {{-- <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </section>
    </div>
</x-UserDashboard-Layout>