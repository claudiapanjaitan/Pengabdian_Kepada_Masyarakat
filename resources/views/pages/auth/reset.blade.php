<x-Auth-Layout title="Login">
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
  
        <div id="reset_page">
          <div class="card login-card">
            <div class="row no-gutters">
              <div class="col-md-5">
                <img src="{{asset('assets/images/Produk/login.jpg')}}" class="login-card-img">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <p class="login-card-description">Reset</p>
                  <form id="form_reset">
                    <input type="hidden" name="token" id="token" value="{{$token}}">
                    <div class="form-group">
                      <input type="password" name="password" id="password" class="form-control" placeholder="Password Baru">
                    </div>
                    <div class="form-group">
                      <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Konfirmasi Password Baru"> 
                    </div>
                    <button name="reset" id="reset" class="btn btn-block login-btn mb-4" type="button" value="" onclick="handle_post('#reset','#form_reset','{{route('auth.do_reset')}}','Reset');">Reset</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
  
    </main>
    @section('custom_js')
        <script type="text/javascript">
          function s() {
            var i = document.getElementById("email");
            var j = document.getElementById("password").value;
            if (i.value == "" || j.length < 4) {
              document.getElementById("start_button").disabled = true;
            } else {
              document.getElementById("start_button").disabled = false;
            }
          }
        </script>
    @endsection
  </x-Auth-Layout>