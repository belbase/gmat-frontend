@extends('layout.exam')
@section('layouts')
   {{-- This division --}}
              <form id="target" action="/practice/exam/next" method="post">
                @if(isset($gt))
                  <input type="hidden" id="timer_field" name="time_taken" value="{{ $gt }}">
                  <input type="hidden" id="countdown_field" name="count_taken" value="{{ $gt }}">
                @endif
              @include('question.'.strtolower($section))
              </form>
@stop
