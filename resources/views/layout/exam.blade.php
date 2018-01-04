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
  	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  	{{-- For Fonts --}}
  	<link href='https://fonts.googleapis.com/css?family=Arima Madurai' rel='stylesheet'>
  	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  	{{-- For Bootstrap --}}
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{!! asset('assets/css/exam.css') !!}">
    @include('layout.partial.analytic')
  </head>
  <body background="{{ asset('/assets/img/background.jpg') }}">
    <div class="container">
      <div class="row">
        <main class="col-md-10 col-md-offset-1" id="doc">
          <section class=" col-md-12">

              @include('layout.partial.title')

                @include('layout.partial.timer')

          </section>
          <section class="lower-header col-md-12">
            <div class="pull-right">
              {{-- <span class="fa fa-flag-o"> Flag Your Question Here</span> --}}
            </div>
          </section>
          <section class="main col-md-12">
            @yield('layouts')
          </section>
          <section class="footer col-md-12">
            <div class="pull-left col-md-6">
              <form class="" action="/practice/exam/end" method="post">
                {{ csrf_field() }}
                <button type="submit" value="end" name="end" class="btn btn-panel pull-left"> <span class="fa fa-sign-out"> Exit Exam</span> </button>
              </form>
            </div>
            <div class="pull-right col-md-6">
              <button type="submit" value="next" form="target" name="next" id="next" class="pull-right btn btn-panel"> <span class="fa fa-arrow-right"> Next</span> </button>
            </div>
          </section>
        </main>
      </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{!! asset('assets/js/scripts.js') !!}"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $(window).resize(function() {
        var bodyheight = $(this).height();
        $("#doc").height(bodyheight);
        $(".overlap").height(bodyheight-"400px")
    }).resize();
    if($("#target").length == 0) {
      $("#next").css('display','none');
      }
      });
    </script>

  </body>
</html>
