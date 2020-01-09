<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/toastr/toastr.min.css">
  
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
  a {
    color: #0097a7;
    text-decoration: none;
    background-color: transparent;
}
  .btn-primary {
    color: #fff;
    background-color: #0097a7;
    border-color: #0097a7;
    box-shadow: none;
  }
    .login-card-body, .register-card-body {
    background: #e0f7fa;
    border-top: 0;
    color:#0097a7;
    padding: 20px;
}
    body, html {
      background: url('<?= base_url('assets/dist/img/pln_backg.jpg') ?>') !important;
      background-repeat: no-repeat !important;
      background-size: contain !important;
      background-position: center !important;
      background-attachment: fixed;
      background-color: #26a69a !important;
    }
  
    .text-muted {
    color:#004d40 !important;
    border-color:fff;
}
.login-logo a, .register-logo a {
    color: #fafafa;
    font-weight: bold;
    border-color: black;
}
.strokeme {
  color: white;
  text-shadow: -1px -1px 0 #26a69a, 1px -1px 0 #26a69a, -1px 1px 0 #26a69a, 1px 1px 0 #26a69a;
}
  </style>
  
</head>
<body class="hold-transition">

<div class="container">
  <div class="row">
    <div class="col-md-4 pt-5">
      <div class="strokeme mt-5 pt-5">
        <h1><b><center>ENGINEERING<br>PLN UIK SBS</center><b></h1>
      </div>

      <?= $this->session->flashdata('msg') ?>
      <?= form_open('login', ['id' => 'login'], ['login' => 'test']) ?>
      <div class="card">
        <div class="card-body py-5">

          

            <div class="input-group mb-3">
              <input type="text" name="nip" class="form-control" placeholder="NIP">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-primary btn-block" id="masuk">Login</button>
            <p class="mb-1 mt-4">
              <a href="forgot-password.html">Forgot Password</a>
            </p>
          </div>
        </div>
        
          
          <?= form_close() ?>

          <p class="mt-3 text-muted text-center"><b>Copyright &copy; Lebah Gantengs</b></p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <div class="col"></div>
  </div>
</div>

<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>

<script>
  $(function() {
    $('#masuk').click(function() {
      var nip = $('input[name=nip]').val();
      var password = $('input[name=password]').val();

      if(nip == '' || password == '') {
        toastr.warning('Form tidak boleh kosong')
      } else {
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>login/cek_use',
            dataType: 'JSON',
            data: {nip:nip, password:password},
            success: function(data) {
              console.log(nip)
              console.log(password)
              if(data.status) {
                toastr.error('Username / Password salah')
              } else {
                $('#login').submit();
              }
            }
        });
      }

    });
  })
</script>

</body>
</html>