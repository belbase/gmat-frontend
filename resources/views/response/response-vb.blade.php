@extends('layout.main')
@section('layouts')
   {{-- This division --}}
      <div class="row">
        <div class="col-md-offset-1 col-md-10 jumbotron">
          <span class='label label-{{ ($response!=1)?"success":"danger" }}'> {{ ($response!=1)?"Right Answer!":"Wrong Answer!" }}</span>
        </div>
      </div>
@stop
