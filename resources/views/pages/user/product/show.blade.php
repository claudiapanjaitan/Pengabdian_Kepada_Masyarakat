<x-User-Layout title="Detail Produk">
    <div class="product_image_area">
        <div class="container">
            @if(session('error'))
                <p class="text-danger text-center">{!! session('error') !!}</p>
            @endif
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="owl-carousel owl-theme s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" style="max-width: 100%;" src="{{$produk->image}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{$produk->nama}}</h3>
                        <h2>Rp.{{number_format($produk->harga)}}</h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span>Kategori</span> : {{$produk->category->kategori_nama}}</a></li>
                            </br>
                            <li><a class="active" href="#"><span>Penjual</span> : {{ $produk->penjual ?  $produk->penjual->nama : ''}}</a></li>
                        </br>
                            <li><a href="#"><span>Stok</span> : {{ $produk->kuantitas }}</a></li>
                        </ul>
                        <p>{{$produk->deskripsi_pendek}}</p>
                        @if($produk->kuantitas > 0)
                        <div class="product_count">
                            <label for="qty">Kuantitas :</label>
                            <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="ti-angle-right"></i></button>
                            <form action="{{route('cart.store')}}" method="post">
                                @csrf
                                <input type="number" class="buyfield" name="qty" value="1" min="1" />
                                <input type="hidden" class="buyfield" name="produk_id" value="{{ $produk->id}}" />
                                <input type="hidden" class="buyfield" name="name" value="{{ $produk->nama}}" />
                                <input type="hidden" class="buyfield" name="image" value="{{ $produk->image }}" />
                                <input type="hidden" class="buyfield" name="price" value="{{ $produk->harga}}" />
                                <input type="submit" class="button primary-btn" name="submit" value="Buy Now" />
                            </form>
                        </div>
                        <div class="card_area d-flex align-items-center">
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <center>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="true">Review</a>
                    </li>
                </center>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>{{$produk->deskripsi_panjang}}</p>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5>Stok</h5>
                                    </td>
                                    <td>
                                        <h5>{{$produk->kuantitas}}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Berat</h5>
                                    </td>
                                    <td>
                                        <h5>{{$produk->berat}}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Warna</h5>
                                    </td>
                                    <td>
                                        <h5>{{$produk->warna}}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Tanggal Publikasi</h5>
                                    </td>
                                    <td>
                                        <h5>{{$produk->produk_date}}</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="review_list">
                                <div class="review_item">
                                    @foreach ($row as $row)
                                    <div class="media">
                                        <div class="d-flex">
                                            {{-- <img src="{{$row->foto}}" alt=""> --}}
                                        </div>
                                        <div class="media-body">
                                            <div id='rate-{{$row->id}}'>
                                                <h4>{{$row->nama_lengkap}}</h4>
                                                <p style="margin-bottom: 20px;">
                                                    {{$row->isi_ulasan}}
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-6">
                            <div class="review_box">
                                <h4>Add a Review</h4>

                                <form action="<?php // base_url('produk/reviewproduk/' . $get_detail_product->produk_id) ?>" class="form-contact form-review mt-3" method="post">

                                    <div class="form-group">
                                        <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text" value="<?php // $nama_lengkap; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" type="email" value="<?php // $email; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="judul" name="judul" type="text" placeholder="Enter Subject">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control different-control w-100" name="isi_ulasan" id="isi_ulasan" cols="30" rows="5" placeholder="Enter Message"></textarea>
                                    </div>
                                    <div class="form-group text-center text-md-right mt-3">
                                        <button type="submit" name="submit" class="button button--active button-review">Submit
                                            Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row">
                <div class="col-lg-6">

                </div>

            </div>
        </div>

        </div>
        </div>
    </section>
    <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; 2022 <div class="bullet"></div> Develop By <a href="#">Kelompok 15
                TA</a>
        </div>
        <div class="footer-right">
            2.3.0
        </div>
    </footer>
    @section('cutsom_js')
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
        function highlightStar(obj, id) {
            removeHighlight(id);
            $('#rate-' + id + ' li').each(function(index) {
                $(this).addClass('highlight');
                if (index == $('#rate-' + id + ' li').index(obj)) {
                    return false;
                }
            });
        }

        // event yang terjadi pada saat kita mengarahkan kursor kita ke sebuah object
        function removeHighlight(id) {
            $('#rate-' + id + ' li').removeClass('selected');
            $('#rate-' + id + ' li').removeClass('highlight');
        }

        function addRating(obj, id) {
            $('#rate-' + id + ' li').each(function(index) {
                $(this).addClass('selected');
                $('#rate-' + id + ' #rating').val((index + 1));
                if (index == $('#rate-' + id + ' li').index(obj)) {
                    return false;
                }
            });
        }

        function resetRating(id) {
            if ($('#rate-' + id + ' #rating').val() != 0) {
                $('#rate-' + id + ' li').each(function(index) {
                    $(this).addClass('selected');
                    if ((index + 1) == $('#rate-' + id + ' #rating').val()) {
                        return false;
                    }
                });
            }
        }
    </script>
    @endsection
</x-User-Layout>