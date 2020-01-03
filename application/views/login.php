<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log In | PT PLN Persero</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="strokeme">
    <h1><b><center>ENGINEERING<br>PLN KIT SBS</center><b></h1>
  </div>

  <?= $this->session->flashdata('msg') ?>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?= form_open('login') ?>

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
        
        <input type="submit" class="btn btn-primary btn-block" value="Masuk" name="login">
          
      
      <?= form_close() ?>

      <p class="mb-1 mt-4">
        <a href="forgot-password.html">Forgot Password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
  <p class="mt-3 text-muted text-center"><b>Copyright &copy; Lebah Gantengs</b></p>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"/></script>

</body>
</html>
