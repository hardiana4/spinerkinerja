<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('template/dist/img/logo.png') }}">
  @include('p_part.asset')
</head>
@include('p_part.header')
@include('p_part.sidebar')
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper"> 
<div class="content-wrapper">
    @yield('container')
</div>
  @include('p_part.footer')
</body>
</html>