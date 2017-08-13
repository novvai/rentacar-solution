<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rent a Car</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}">
  @yield('custom-css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a  href="{{url('/')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Rent a Car</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Rent a Car</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{route('admin.cars.index')}}"><i class="fa fa-car"></i><span>Cars</span></a></li>
        <li><a href="{{route('admin.brands.index')}}"><i class="fa fa-barcode"></i><span>Car Brands</span></a></li>
        <li><a href="{{route('admin.colors.index')}}"><i class="fa fa-paint-brush"></i><span>Car Colors</span></a></li>
        <li class="header"></li>
        <li><a href="{{route('admin.reservations.index')}}"><i class="fa fa-list-alt"></i><span>Reservations</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content">
      @include('parts._userFeedback')

        @yield('content')
      </section> <!--  .content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; {{date('Y')}}  All rights
    reserved.
  </footer>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>
<script src="{{asset('js/global.js')}}"></script>
@yield('page-scripts')
</body>
</html>
