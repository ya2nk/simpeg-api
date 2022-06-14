<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Simpeg - Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="{{ asset('assets/css/notify-style.css') }}" rel="stylesheet">
</head>

<body>

  <main>
    <nav class="navbar navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#">SISTEM INFORMASI PEGAWAI KABUPATEN KERINCI</a>
      </div>
    </nav>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3" x-data="login">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi-person"></i></span>
                        <input type="text" name="username" class="form-control" :class="(errors.username ? 'is-invalid' : '')" id="yourUsername" required x-model="username">

                      </div>
                      <span class="text-danger">
                          <i x-text="(errors.username ? errors.username[0] : '')"></i>
                      </span>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi-lock"></i></span>
                        <input type="password" name="passwword" class="form-control"  id="yourPassword" required x-model="password" :class="(errors.password ? 'is-invalid' : '')">
                      </div>
                      <span class="text-danger">
                          <i x-text="(errors.password ? errors.password[0] : '')"></i>
                      </span>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe" x-model="remember">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="button" @click="doLogin">Login</button>
                    </div>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/alpine.min.js') }}" defer></script>
  <script src="{{ asset('assets/js/index.var.js') }}" defer></script>
  <!-- Template Main JS File -->
  <script src="https://cdn.jsdelivr.net/npm/js-loading-overlay@1.1.0/dist/js-loading-overlay.min.js"></script>
  <script type="text/javascript">
    document.addEventListener("alpine:init",() => {
      Alpine.data("login",() => ({
        username:null,
        password:null,
        remember:0,
        errors:{},
        doLogin() {
          JsLoadingOverlay.show();
          $.post("{{ url('login') }}",{username:this.username,password:this.password,"_token": "{{ csrf_token() }}",remember:this.remember}).done(resp => {
              JsLoadingOverlay.hide();
              if (resp.error == false) {
                  new AWN().success(resp.message);
                  setTimeout(() => {
                    location.href = "{{ url('dashboard') }}";
                  },1000)
              } else {
                new AWN().alert(resp.message);
              }
          }).fail(err => {
            JsLoadingOverlay.hide();
            var error = err.responseJSON;
            if (error.hasOwnProperty('errors')) {
              this.errors = error.errors;
            }
            
             new AWN().alert("Error Response Server");
            
          })
        }
      }));
    });
  </script>

</body>

</html>
