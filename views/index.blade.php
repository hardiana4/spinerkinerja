<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Spiner | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/plugins')}}//fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template/plugins')}}//icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/dist')}}//css/adminlte.min.css">

  <link rel="stylesheet" href="../../style.css">

</head>
<body class="hold-transition login-page">
  <div class="image mb-5">
    <img src="template/dist/img/logofix.png" alt="Logo" width="500">
  </div>
<div class="login-box">
      <form action="/login" method="post">
       {{-- @csrf supaya form tdk dibajak  --}}
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="email" id="email" class="form-control rounded-pill" placeholder="Masukan email" autofocus required>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control rounded-pill" placeholder="Password" required>
        </div>
        <div class="social-auth-links text-center mb-3">
            <button type="submit" class="btn btn-block btn-dark rounded-pill"> Login </button>
        </div>
      </form>
</div>

<!-- jQuery -->
<script src="{{asset('template/plugins')}}//jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/plugins')}}//bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/dist')}}//js/adminlte.min.js"></script>
</body>
</html>
