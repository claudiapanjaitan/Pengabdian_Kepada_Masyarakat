<x-Admin-Layout title="Produk">
    @php
        $title = 'Produk';
    @endphp
    <div class="main-content" id="content_list">
        <section class="section">
            <div class="section-header">
                <h1><?= $title; ?></h1>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">

                    <div class="card">

                        <div class="card-body">
                            <div>
                                <a href="javascript:;" onclick="load_input('{{route('admin.produk.create')}}');" class="btn btn-success btn-lg">
                                    <i class="fa fa-plus"></i> Tambah Produk
                                </a>
                            </div>

                            <div id="list_result"></div>

                        </div>
                </div>
        </section>
    </div>
    <div id="content_input"></div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-Admin-Layout>