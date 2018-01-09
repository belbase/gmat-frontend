@extends('layout.exam')
@section('layouts')
  <div class="paragraph">
    @if (isset($request) && $request->session()->has('qCounter'))
        {{{ $request->session()->get('qCounter') }}}.
    @endif
        <center>
          <span class="h2">{{{ $page->title }}} Instructions</span><br>
           <span class="h3">{{ $page->no_of_q }} {{ ($page->no_of_q<=1)?'Question':'Questions' }}</span><br>
           <span class="h3">{{ " Time: ".$page->time_taken }}</span>
        </center>
        <div class="col-md-10 col-md-offset-1">
          {{-- <div class="row"> --}}
            {{-- <div class="col-md-4"> --}}
            {{-- </div> --}}
          {{-- </div> --}}
          <br>
          <div class="row">
            <div class="col-md-12">
              {!! $page->instructions !!}
            <br/><br/>
                <form id="target" action="/practice/exam/next" method="post">
                  {{ csrf_field() }}
                </form>
          </div>
        </div>

  </div>
@endsection
