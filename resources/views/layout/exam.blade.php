<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php
    $other=(isset($page->title))?$page->title:'404 Not Found';
    ?>
    <title>{{ (isset($title))?$title: $other }} - EduShastra GMCAT</title>
    <link rel="icon" href="{{ asset('/assets/img/favicon.ico') }}" type="image/x-icon">
    {{-- For mobile first --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	{{-- For Social Icons --}}
  	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  	{{-- For Fonts --}}
  	<link href='https://fonts.googleapis.com/css?family=Arima Madurai' rel='stylesheet'>
  	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  	{{-- For Bootstrap --}}
  	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    @yield('css')
    <link rel="stylesheet" href="{!! asset('assets/css/exam.css') !!}">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    @include('layout.partial.analytic')
  </head>
  <body background="{{ asset('/assets/img/background.jpg') }}">
    <div class="container">
      <div class="row">
        <main class="doc">
          <section class="header">

              @include('layout.partial.title')

                @include('layout.partial.timer')

          </section>
          <section class="lower-header">
            <div class="pull-right flag">
              {{-- <span class="fa fa-flag-o"> Flag Your Question Here</span> --}}
            </div>
          </section>
          <section class="main">
            @yield('layouts')
          </section>
          <section class="footer">
            <div class="footer-col">
              <form action="/practice/exam/end" method="post">
                {{ csrf_field() }}
                <button type="submit" value="end" name="end" class="btn-end"> <span class="fa fa-sign-out"> <span class="hidden-xs">Exit Exam</span></span> </button>
              </form>
            </div>
            <div class="timmer-alt">
              <center>
                @if(isset($gt))
                  <span class="fa fa-clock-o" id="timer-alt"></span>
                @endif
                <br/>
                @if(isset($qno))
                  <span class="fa fa-print"> {{ $qno }} of {{ $aq }}</span><br/>
                @endif
              </center>
            </div>
            <div class="footer-col">
              <button type="submit" value="next" form="target" name="next" id="next" class="btn-next"> <span class="fa fa-arrow-right"> <span class="hidden-xs"> Next</span></span> </button>
            </div>
          </section>
        </main>
      </div>
    </div>

    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <script src="{!! asset('assets/js/script.js') !!}"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $(window).resize(function() {
        var bodyheight = $(this).height();
        $(".doc").height(bodyheight);
        $(".overlap").height(bodyheight-"400px")
    }).resize();
    if($("#target").length == 0) {
      $("#next").css('display','none');
      }
      });
    </script>
    @yield('js')
  </body>
</html>
