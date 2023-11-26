@auth
<div class="card">
    <form class="needs-validation" id="form_edit">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{$user->nama_lengkap}}">
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{$user->tempat_lahir}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{$user->username}}">
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{$user->tanggal_lahir}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}" readonly>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{$user->alamat}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Foto Profile</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>Kode Pos</label>
                    <input type="text" name="kodepos" id="kodepos" class="form-control" value="{{$user->kodepos}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Nomor Telepon</label>
                    <input type="text" name="notelp" id="notelp" class="form-control" value="{{$user->notelp}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 col-12">
                    <label>Bio</label>
                    <textarea class="form-control summernote-simple" name="bio" id="bio">{{$user->bio}}</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button onclick="handle_upload('#change_profil','#form_edit','{{route('user.editProfile',Auth::user()->id)}}','PATCH','Simpan');" name="submit" class="btn btn-primary" id="change_profil">Simpan</button>
        </div>
    </form>
</div>
@endauth
@guest
@if(Auth::guard('penjual')->user())
<div class="card">
    <form class="needs-validation" id="form_edit">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{Auth::guard('penjual')->user()->nama_lengkap}}">
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{Auth::guard('penjual')->user()->nama}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{Auth::guard('penjual')->user()->tempat_lahir}}">
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{Auth::guard('penjual')->user()->tanggal_lahir}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{Auth::guard('penjual')->user()->email}}" readonly>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{Auth::guard('penjual')->user()->alamat}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Foto Profile</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>Kode Pos</label>
                    <input type="text" name="kodepos" id="kodepos" class="form-control" value="{{Auth::guard('penjual')->user()->kodepos}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Nomor Telepon</label>
                    <input type="text" name="notelp" id="notelp" class="form-control" value="{{Auth::guard('penjual')->user()->notelp}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 col-12">
                    <label>Bio</label>
                    <textarea class="form-control summernote-simple" name="bio" id="bio">{{Auth::guard('penjual')->user()->bio}}</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
        <button onclick="handle_upload('#change_profil','#form_edit','{{route('penjual.editProfile',Auth::guard('penjual')->user()->id)}}','PATCH','Simpan');" name="submit" class="btn btn-primary" id="change_profil">Simpan</button>
        </div>
    </form>
</div>
@endif
@endguest