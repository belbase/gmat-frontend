@extends('layout.exam')
@section('layouts')
  @if (isset($request) && $request->session()->has('qCounter'))
      {{{ $request->session()->get('qCounter') }}}.
  @endif
      <center><span class="h2">
         {{{ $page->title }}} Instructions</span>  </center>
      <div class="col-md-10 col-md-offset-1" style="margin-top: 10px;">
        <div class="row">
          <div class="col-md-4">
            <b>{{ $page->no_of_q }} {{ ($page->no_of_q<=1)?'Question':'Questions' }}</b>
          </div>
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
            <b>{{ " Time: ".$page->time_taken }}</b>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12" style="overflow-y:auto; height:390px;">
            {!! $page->instructions !!}
          <br/><br/>
              <form id="target" action="/practice/exam/next" method="post">
                {{ csrf_field() }}
              </form>
        </div>
      </div>

@endsection
