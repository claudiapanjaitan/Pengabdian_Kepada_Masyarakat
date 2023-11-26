<x-UserDashboard-Layout title="Order">
    <div class="main-content" id="content_list">
        <section class="section">
            <div class="section-header">
                <h1>Pesanan Saya</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <div id="list_result"></div>
        </section>
    </div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-UserDashboard-Layout>