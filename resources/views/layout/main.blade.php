<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
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
		<link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
		{{-- For Bootstrap --}}
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}" type="text/css">
			@include('layout.partial.analytic')
	</head>
	<body>
		<div class="main-container">
			<div class="row">
				<div class="main-section" style="overflow-y: auto;">
					<div class="row header">
						<div class="logo">
							<a href="/"><img src="{{ asset('/assets/img/logo2.png') }}" style="height:70px;" /></a>
						</div>
						@if(Auth::check())
					<div class="info">
						<p> Hi <b>{{ Auth::user()->name }}</b>, </p>
						<p>Click on the links below to get started. </p>
					</div>

					<div class="bar">
						<form action="/logout" method="post">
							{{ csrf_field() }}
							<button type="submit" id="logout" value="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</button>
						</form>
					</div>
					@endif
				</div>

		        @yield('layouts')

				</div>
			</div>
		</div>
		<script type="text/javascript">
      $(document).ready(function(){
        $(window).resize(function() {
        var bodyheight = $(this).height();
        $(".main-section").height(bodyheight);
        // $(".overlap").height(bodyheight-"400px")
				var maxheight = 0;
				$('div.index-cell').each(function () {
					maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
				});
				$('div.index-cell').height(maxheight);
    }).resize();

      });
    </script>
</body>
</html>
