<x-UserDashboard-Layout title="Profile">
                @if(Auth::guard('penjual')->user())
                 <!--Penjual Main Content -->
                 <div class="main-content">
                    <section class="section">
                        <div class="section-header">
                            <h1>Dashboard</h1>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            </div>
                        </div>
                        <div class="section-body">
                            <h2 class="section-title">Hi, {{{Auth::guard('penjual')->user()->nama}}}</h2>
                            <p class="section-lead">
                                Selamat Datang di Dashboard !
                            </p>
    
                            <div class="row mt-sm-4">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card profile-widget">
                                        <div class="profile-widget-header">
                                            {{-- {{dd(Auth::guard('penjual')->user()->image)}} --}}
                                            <img alt="image" src="{{'storage/'.Auth::guard('penjual')->user()->foto}}" class="rounded-circle profile-widget-picture" style="width:100px; height:100px;">
    
                                            <div class=" profile-widget-items">
                                                <div class="profile-widget-item">
                                                    <div class="profile-widget-item-label">Total Pesanan : 180
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-widget-description">
                                            <div class="profile-widget-name"> {{Auth::guard('penjual')->user()->nama}}
                                            </div>
                                            {{Auth::guard('penjual')->user()->bio}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                @else
                <!--User Main Content -->
                <div class="main-content">
                    <section class="section">
                        <div class="section-header">
                            <h1>Dashboard</h1>
                            <div class="section-header-breadcrumb">
                                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            </div>
                        </div>
                        <div class="section-body">
                            <h2 class="section-title">Hi, {{{Auth::user()->username}}}</h2>
                            <p class="section-lead">
                                Selamat Datang di Dashboard !
                            </p>
    
                            <div class="row mt-sm-4">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card profile-widget">
                                        <div class="profile-widget-header">
                                            <img alt="image" src="{{asset('storage/'.Auth::user()->foto)}}" class="rounded-circle profile-widget-picture" style="width:100px; height:100px;">
    
                                            <div class=" profile-widget-items">
                                                <div class="profile-widget-item">
                                                    <div class="profile-widget-item-label">Total Pesanan : 180
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-widget-description">
                                            <div class="profile-widget-name"> {{Auth::user()->username}}
                                            </div>
                                            {{Auth::user()->bio}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                @endif
</x-UserDashboard-Layout>