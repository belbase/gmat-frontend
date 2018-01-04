@extends('layout.shell')
@section('layouts')
  <div class="content-wrapper">
    <div class="container-fluid">

      {{-- <form class="form-horizontal" action="/dashboard/question/store" method="post" enctype="multipart/form-data"> --}}
        <div class="row">
            {!! csrf_field() !!}
            @include('dashboard.widgets.editor')

            @include('dashboard.widgets.editor-modules')
        </div>
      {{-- </form> --}}
      <div class="row">
        <div class="col-md-10 offset-md-1 result" id="result">

        </div>
      </div>
  </div>
@endsection
