<x-UserDashboard-Layout title="Data Produk">
        @php 
            $title = 'Data Produk'
        @endphp
                <div class="main-content">
                    <section class="section">
                        <div id="content_list">
                            <div class="section-header">
                                <h1>{{$title}}</h1>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="jacascript:;" onclick="load_input('{{route('penjual.produk.create')}}');" class="btn btn-success btn-lg" style="margin-bottom: 30px;">
                                                <i class="fa fa-plus"></i> Tambah Produk
                                            </a>
                                        </div>
                                        <div id="list_result"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="content_input"></div>
                    </section>  
                </div>
            </div>    
        </div>
    </div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-UserDashboard-Layout>