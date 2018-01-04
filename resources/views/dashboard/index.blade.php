@extends('layout.shell')
@section('layouts')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      {{-- @include('dashboard.widgets.icon-card') --}}
      <!-- Area Chart Example-->
      {{-- @include('dashboard.widgets.area-chart') --}}
      <div class="row">
        {{-- @include('dashboard.widgets.news-feed') --}}

        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          {{-- @include('dashboard.widgets.pie-chart') --}}

            <script src='{{ asset("/assets/js/sb-admin-charts.min.js") }}'></script>
          <!-- Example Notifications Card-->
          {{-- @include('dashboard.widgets.notification-card') --}}

        </div>
      </div>
      <!-- Example DataTables Card-->
      {{-- @include('dashboard.widgets.table') --}}

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
