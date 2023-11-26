<x-UserDashboard-Layout title="Login">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login Admin</h4>
                            </div>

                            <div class="card-body">
                                <?php //$this->session->flashdata('pesan') ?>
                                <form id="form_login" class="needs-validation" >
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email">
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <input id="password" type="password" class="form-control" name="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="button" onclick="handle_post('#login','#form_login','{{route('admin.auth.login')}}');" class="btn btn-primary btn-lg btn-block" id="login" tabindex="4" style="border-color: #e99c2e;">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
</x-UserDashboard-Layout>