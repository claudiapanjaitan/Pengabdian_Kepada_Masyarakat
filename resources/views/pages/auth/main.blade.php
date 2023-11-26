<x-Auth-Layout title="Login">
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">

      <div id="login_page">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img src="{{asset('assets/images/Produk/login.jpg')}}" class="login-card-img">
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <p class="login-card-description">Login</p>
                <form id="form_login">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" onkeyup="s()">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" onkeyup="s()">
                  </div>
                  <button name="login" id="login" class="btn btn-block login-btn mb-4" type="button" onclick="handle_post('#login','#form_login','{{route('auth.login')}}','Login');" value="">Login</button>
                </form>
                <a href="javascript:;" onclick="auth_content('forgot_page');" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">
                  <a href="javascript:;" onclick="auth_content('register_page');" class="text-reset" style="color:aliceblue">Belum Punya akun? Daftar</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="register_page">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img src="{{asset('assets/images/Produk/login.jpg')}}" class="login-card-img">
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <p class="login-card-description">Register</p>
                <form id="form_register">
                  <div class="form-group">
                    <label for="username" class="sr-only">Username</label>
                    <input type="username" name="username" id="username" class="form-control" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password_confirm" class="sr-only">Re-Type Password</label>
                    <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Re-Type Password">
                  </div>
                  <button name="register" id="register" class="btn btn-block login-btn mb-4" type="button" value="" onclick="handle_post('#register','#form_register','{{route('auth.register')}}','Register');">Register</button>
                </form>
                <p class="login-card-footer-text">
                  <a href="javascript:;" onclick="auth_content('login_page');" class="text-reset" style="color:aliceblue">Sudah Punya Akun? Login</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="forgot_page">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img src="{{asset('assets/images/Produk/login.jpg')}}" class="login-card-img">
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <a href="javascript:;" onclick="auth_content('forgot_page');">
                  <p class="login-card-description">Lupa Password</p>
                </a>
                <form id="form_forgot">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <button name="forgot" id="forgot" class="btn btn-block login-btn mb-4" type="button" value="" onclick="handle_post('#forgot','#form_forgot','{{route('auth.forgot')}}','Reset Password');">Reset Password</button>
                </form>
                <p class="login-card-footer-text">
                  <a href="javascript:;" onclick="auth_content('login_page');" class="text-reset" style="color:aliceblue">Kembali ke Login</a>
                </p>
              </div>
            </div>
          </div>  
        </div>  
      </div>
      
    </div>

  </main>
  @section('custom_js')
      <script type="text/javascript">
        auth_content('login_page');
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