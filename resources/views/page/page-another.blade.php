@extends('layout.exam')
@section('layouts')
   {{-- This division --}}
              <form id="target" action="/practice/exam/next" method="post" class="main">
                @if(isset($gt))
                  <input type="hidden" id="timer_field" name="time_taken" value="{{ $gt }}">
                @endif
              @include('another.'.strtolower($section))
              {{-- {{ $section }} --}}
              </form>
@stop
