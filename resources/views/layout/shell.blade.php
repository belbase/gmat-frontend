<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Deepak Belbase">
  <title>{{ $title }} - EduShastra GMCAT</title>

	<link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
	<!-- Include the Quill library -->
  <script src='{{ asset("/assets/vendor/jquery/jquery.min.js") }}'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
  {{-- <script src="http://malsup.github.com/jquery.form.js"></script> --}}
  <!-- Custom scripts for all pages-->
  <script src='{{ asset("/assets/vendor/jquery-ui/jquery-ui.min.js") }}'></script>
  <script src='{{ asset("/assets/js/sb-admin.min.js") }}'></script>

	<script src="https://cdn.quilljs.com/1.3.4/quill.js"></script>
	<link rel="icon" href="{{ asset('/assets/img/favicon.ico') }}" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href='{{ asset("/assets/vendor/bootstrap/css/bootstrap.min.css") }}' rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href='{{ asset("/assets/vendor/font-awesome/css/font-awesome.min.css") }}' rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href='{{ asset("/assets/vendor/datatables/dataTables.bootstrap4.css") }}' rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href='{{ asset("/assets/css/sb-admin.css") }}' rel="stylesheet">
  {{-- <link href='{{ asset("/assets/css/backend.css") }}' rel="stylesheet"> --}}
  <script src='{{ asset("/assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}'></script>
  <!-- Core plugin JavaScript-->
  <script src='{{ asset("/assets/vendor/jquery-easing/jquery.easing.min.js") }}'></script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a href="/dashboard"><img src='{{ asset("/assets/img/logo-white.png") }}' alt="EduShusatra" class="navbar-brand" ></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      @include('dashboard.widgets.page')
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        {{-- @include('dashboard.widgets.notification') --}}
        {{-- @include('dashboard.widgets.message') --}}
        {{-- @include('dashboard.widgets.search')  --}}
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/logout">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
	@yield('layouts')
	<!-- Bootstrap core JavaScript-->
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small>Copyright &copy; Edushastra Education Service Private Limited.</small>
      </div>
    </div>
  </footer>
	<!-- Page level plugin JavaScript-->
	<script src='{{ asset("/assets/vendor/chart.js/Chart.min.js") }}'></script>
	<script src='{{ asset("/assets/vendor/datatables/jquery.dataTables.js") }}'></script>
	<script src='{{ asset("/assets/vendor/datatables/dataTables.bootstrap4.js") }}'></script>

	<!-- Custom scripts for this page-->
	<script src='{{ asset("/assets/js/sb-admin-datatables.min.js") }}'></script>

</body>

</html>
