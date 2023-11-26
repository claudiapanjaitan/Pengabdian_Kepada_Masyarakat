<x-UserDashboard-Layout title="Profile">
    <!-- Main Content -->
    <div class="main-content" id="content_list">
        <section class="section">
            <div class="section-header">
                <h1>Edit Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                @auth
                    <h2 class="section-title">Hi, {{Auth::user()->username}}</h2>
                @endauth
                @guest
                @if(Auth::guard('penjual')->user())            
                    <h2 class="section-title">Hi, {{Auth::guard('penjual')->user()->nama}}</h2>
                @endif
                @endguest
                <p class="section-lead">
                    Kelola Informasi Profil Anda pada Halaman ini
                </p>

                <div id="list_result"></div>
            </div>
        </section>
    </div>
    @section('custom_js')
        <script>
            load_list(1);
        </script>
    @endsection
</x-UserDashboard-Layout>