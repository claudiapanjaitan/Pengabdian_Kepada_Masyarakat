<x-User-Layout title="Cart">
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                @if(session('error'))
                    <p class="text-danger text-center">{!! session('error') !!}</p>
                @endif
                @php
                    $totalHarga = 0;
                    $grandtotal = 0;
                @endphp
                <div class="table-responsive">
                    @if(count($carts) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Gambar Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Kuantitas</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $item)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p><?php echo $item['name'] ?> </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <img class="img-responsive" src="{{$item['attributes']['image']}}" alt="">
                                        </td>
                                        <td>
                                            <h7>Rp.{{number_format($item['price'])}}</h7>
                                        </td>
                                        @php
                                            $totalHarga += $item['price'];
                                            $grandtotal += $item['price'] * $item['quantity'];
                                        @endphp
                                        <td>
                                            <form action="{{route('cart.update')}}" method="post">
                                            @csrf
                                                @method('PATCH')
                                                <div class="product_count">
                                                    <input type="number" name="quantity" value="{{$item['quantity']}}" min="1"/>
                                                    <input type="hidden" name="id" value="{{$item['id']}}"/>
                                                </div>
                                                <input type="submit" name="submit" value="Update" class="btn btn-primary" style="border-color: #e99c2e;" />
                                            </form>
                                        </td>
                                        <td>
                                            <h7>Rp.{{number_format($item['price'] * $item['quantity'])}}</h7>
                                        </td>
                                        <td>
                                            <form action="{{route('cart.remove')}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{$item['id']}}" />
                                                <input type="submit" name="submit" value="X" class="btn btn-danger" />
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="bottom_button">
                                </tr>
                                <tr>
                                    <td align="right" colspan="4">
                                        <h5>Total Item</h5>
                                    </td>
                                    <td align="right" colspan="4">
                                        <h7>{{number_format($carts->count())}}</h7>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" colspan="4">
                                        <h5>Total Harga</h5>
                                    </td>
                                    <td align="right" colspan="4">
                                        <h7>Rp. {{number_format($grandtotal)}}</h7>
                                    </td>
                                </tr>
                                <tr class="out_button_area">
                                    <td align="right" colspan="6">
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn" href="{{route('home')}}">Lanjut Belanja</a>
                                            @if(Auth::user())
                                                <a class="primary-btn ml-2" href="{{route('user.checkout',$item->id)}}">Langsung ke Checkout</button>
                                            @else
                                            <a class="primary-btn ml-2" href="{{route('auth.index')}}">Langsung ke Checkout</button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <div class="row">
                            <div class="col-md-12 ftco-animate">
                                <div class="alert alert-info">Keranjang Anda Kosong.<br><a href="{{route('home')}}">Jelajahi Produk Kami</a> dan mulailah berbelanja!</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
    <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; 2022 <div class="bullet"></div> Develop By <a href="#">Kelompok 15
                TA</a>
        </div>
        <div class="footer-right">
            2.3.0
        </div>
    </footer>
    </div>
</x-User-Layout>