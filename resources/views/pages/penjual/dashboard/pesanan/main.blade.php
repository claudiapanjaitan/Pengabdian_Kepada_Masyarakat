<x-UserDashboard-Layout title="Kelola Order">
    @php
        $title = "Kelola Order";
    @endphp
    <!-- Modal -->
    <div class="modal fade" id="checkStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form id="content_filter">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cek Status Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="orderid" class="col-form-label">Order ID/Invoice</label>
                            <input type="text" required class="form-control" name="order_id" id="orderid" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Proses</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div id="content_list">
            <section class="section">
                <div class="section-header">
                    <h1>{{$title}}</h1>
                </div>
                <div>
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#checkStatus">Status</button>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                        <div id="list_result"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div id="content_input"></div>
    </div>
@section('custom_js')
    <script>
        load_list(1);
    </script>
@endsection
</x-UserDashboard-Layout>