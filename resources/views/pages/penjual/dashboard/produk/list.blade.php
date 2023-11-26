<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">Kode</th>
            <th scope="col">Nama</th>
            <th scope="col">Gambar</th>
            <th scope="col">Kategori</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk as $i => $product)
            <tr>
                <td>{{ $produk->firstItem() + $i}}</td>
                <td style="padding: 30px 50px;">{{ $product->nama }}</td>
                <td style="padding: 30px 50px;"><img src="{{$product->image}}" style="width:45%;" /></td>
                <td style="padding: 30px 50px;">{{$product->category->kategori_nama }}</td>
                <td>
                    @if ($product->status == 1) 
                        <span class="badge badge-success">Published</span>
                    @else
                        <span class="badge badge-danger">Unpublished</span>
                    @endif
                </td>
                <td>
                    @if($product->status == 1)
                        <a href="javascript:;" onclick="handle_confirm('{{route('penjual.produk.unpublished',$product->id)}}');">
                            <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                                <button class="btn btn-success">Unpublished</button>
                            </span>
                        </a>
                    @else 
                        <a href="javascript:;" onclick="handle_confirm('{{route('penjual.produk.published',$product->id)}}');">
                            <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                                <button class="btn btn-warning">Published</button>
                            </span>
                        </a>
                    @endif
                    <a href="javascript:;" onclick="load_input('{{route('penjual.produk.edit',$product->id)}}');">
                        <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                            <button class="btn btn-primary">Edit</button>
                        </span>
                    </a>
                    <a href="javascript:;" onclick="handle_delete('{{route('penjual.produk.destroy',$product->id)}}');" >
                        <span class="svg-icon svg-icon-5 svg-icon-gray-700">
                            <button class="btn btn-danger">Hapus</button>
                        </span>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$produk->links('vendor.pagination.bootstrap-4')}}