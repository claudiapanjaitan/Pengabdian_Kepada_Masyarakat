<x-User-Layout title='Home'>
    <!--welcome-hero start -->

	<!--feature start -->
	<section id="feature" class="feature">
		<div class="container">
			<div class="section-header">
				<h2>Produk Terbaik</h2>
			</div>
			<!--/.section-header-->
			<div class="feature-content">
				<div class="row">
					@foreach($best_products as $item)
						<div class="col-sm-3">

							<div class="single-feature">

								<img src="{{$item->image}}" alt="feature image" class="best_products">
								<div class="single-feature-txt text-center">

									<h3><a href="#">{{$item->nama}}</a></h3>
									<h5>Rp.{{number_format($item->harga)}}</h5>
								</div>

							</div>

						</div>
                    @endforeach
				</div>
			</div>
		</div>
	</section>

	<!--new-arrivals start -->
	<section id="new-arrivals" class="new-arrivals">
		<div class="container">
			<div class="section-header">
				<h2>Daftar Produk</h2>
			</div>\
			<div class="new-arrivals-content">
				<div class="row">
					@foreach($list_products as $data)
						<div class="col-md-3 col-sm-4">

							<div class="single-new-arrival">
								<div class="single-new-arrival-bg">
									<img src="{{$data->image}}" alt="new-arrivals images">
									<div class="single-new-arrival-bg-overlay"></div>
									<div class="new-arrival-cart">
										<p>
											<span class="lnr lnr-cart"></span>
											<a href="#">add <span>to </span> cart</a>
										</p>
										<p class="arrival-review pull-right">
											<span class="lnr lnr-heart"></span>
											<span class="lnr lnr-frame-expand"></span>
										</p>
									</div>
								</div>
								<h4>
									<a href="{{route('produk.show', $data->id)}}">{{$data->nama}}</a>
								</h4>
								<p class="arrival-product-price">Rp.{{ number_format($data->harga)}}</p>
							</div>

						</div>
                    @endforeach
				</div>
			</div>
		</div>
		<!--/.container-->

	</section>
	<!--/.new-arrivals-->
	<!--new-arrivals end -->

	<!--newsletter strat -->
	<section id="newsletter" class="newsletter">
		<div class="container">
			<div class="hm-footer-details">
				<div class="row">
					<div class=" col-md-3 col-sm-6 col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>information</h4>
							</div>
							<!--/.hm-foot-title-->
							<div class="hm-foot-menu">
								<ul>
									<li><a href="#">Beranda</a></li>
									<!--/li-->
									<li><a href="#">Produk</a></li>
									<!--/li-->
									<li><a href="#">Tentang</a></li>
									<!--/li-->
									<li><a href="#">Kontak Kami</a></li>
									<!--/li-->
								</ul>
								<!--/ul-->
							</div>
							<!--/.hm-foot-menu-->
						</div>
						<!--/.hm-footer-widget-->
					</div>
					<!--/.col-->
					<div class=" col-md-3 col-sm-6 col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>Kategori Produk</h4>
							</div>
							<!--/.hm-foot-title-->
							<div class="hm-foot-menu">
								<ul>
									<li><a href="#">Aksesoris</a></li>
									<!--/li-->
									<li><a href="#">Busana</a></li>
									<!--/li-->
									<li><a href="#">Perlengkapan Rumah</a></li>
									<!--/li-->
									<li><a href="#">Sepatu</a></li>
									<!--/li-->
									<li><a href="#">Ulos</a></li>
									<!--/li-->
									<li><a href="#">Souvenir</a></li>
								</ul>
								<!--/ul-->
							</div>
							<!--/.hm-foot-menu-->
						</div>
						<!--/.hm-footer-widget-->
					</div>
					<!--/.col-->
					<div class=" col-md-3 col-sm-6 col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>Layanan</h4>
							</div>
							<!--/.hm-foot-title-->
							<div class="hm-foot-menu">
								<ul>
									<li><a href="#">Custom Ulos</a></li>
									<!--/li-->
									<li><a href="#">Buka Toko</a></li>
									<!--/li-->
								</ul>
								<!--/ul-->
							</div>
							<!--/.hm-foot-menu-->
						</div>
						<!--/.hm-footer-widget-->
					</div>
					<!--/.col-->
					<div class=" col-md-3 col-sm-6  col-xs-12">
						<div class="hm-footer-widget">
							<div class="hm-foot-title">
								<h4>Contact Us</h4>
							</div>
							<!--/.hm-foot-title-->
							<div class="hm-foot-para">
								<p>
									Daftarkan Email Anda
								</p>
							</div>
							<!--/.hm-foot-para-->
							<div class="hm-foot-email">
								<div class="foot-email-box">
									<input type="text" class="form-control" placeholder="Masukkan Email Disini...">
								</div>
								<!--/.foot-email-box-->
								<div class="foot-email-subscribe">
									<span><i class="fa fa-location-arrow"></i></span>
								</div>
								<!--/.foot-email-icon-->
							</div>
							<!--/.hm-foot-email-->
						</div>
						<!--/.hm-footer-widget-->
					</div>
					<!--/.col-->
				</div>
				<!--/.row-->
			</div>
			<!--/.hm-footer-details-->

		</div>
		<!--/.container-->

	</section>
	<!--/newsletter-->
	<!--newsletter end -->

	<!--footer start-->
	<footer id="footer" class="footer">
		<div class="container">
			<div class="hm-footer-copyright text-center">
				<p>
					&copy;copyright. Dikelmbangkan oleh <a href="">Kelompok 15</a>
				</p>
				<!--/p-->
			</div>
			<!--/.text-center-->
		</div>
		<!--/.container-->

		<div id="scroll-Top">
			<div class="return-to-top">
				<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
			</div>

		</div>
		<!--/.scroll-Top-->

	</footer>
	<!--/.footer-->
	<!--footer end-->
</x-User-Layout>