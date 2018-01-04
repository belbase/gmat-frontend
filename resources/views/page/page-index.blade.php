@extends('layout.main')
@section('layouts')
	<br/>
			<div class="index-row">
				{{-- first column --}}
					<div class="index-column">
						<div class="index-cell">
							<center><a href="#"><button type="button" class="btn-main"><span class="fa fa-sticky-note"></span></button></a></center>
							<div class="content">
								<h2>Prepare</h2>
								<p>Get ready for the GMAT exam by learning all about test, the skills you'll need, and tips to create a study plan to help you do your best.</p>
								<ul class="list-unstyled">
									<li><a href="#"> > What is GMAT exam? </a></li>
									<li><a href="#"> > 7 steps to GMAT exam </a></li>
									<li><a href="#"> > Review the maths skills you'll need </a></li>
									<li></li>
								</ul>
								<a href="#"><button type="button" class="btn-arrow-right">Prepare</button></a>
							</div>
						</div>
					</div>
					{{-- second column --}}
					<div class="index-column">
						<div class="index-cell">
							<center><a href="#"><button type="button" class="btn-main" ><span class="fa fa-edit"></span></button></a></center>
							<div class="content">
								<h2>Practice  </h2>
								<p>Try real GMAT exam questions, review your progress, and then apply what you've learned in full length GMAT exams.</p>
								<ul class="list-unstyled">
									<li><a href="/practice"> > Take Exam</a></li>
									<li> </li>
									<li> </li>
								</ul>
								<a href="/practice"><button type="button" class="btn-arrow-right">Practice</button></a>
							</div>
						</div>
					</div>
					{{-- third column --}}
					<div class="index-column">
						<div class="index-cell">
							<center><a href="#"><button type="button" class="btn-main"><span class="fa fa-line-chart"></span></button></a></center>
							<div class="content">
								<h2>Improve</h2>
								<p>Learn strategies to help you go further the GMAT and find prep tools to help you do even better when test day comes around.</p>
								<ul class="list-unstyled">
									<li><a href="#"> > General Exam Strategies </a></li>
									<li><a href="specific.html"> > Specific strategies </a></li>
									<li> </li>
								</ul>
								<a href="#"><button type="button" class="btn-arrow-right">Improve </button></a>
							</div>
						</div>
					</div>

				</div>{{-- end of index-row --}}

				<center> &copy; Copyrights Edushastra Knowledge House.</center>
				<div class="pull-right">
					<img src="{{ asset('/assets/img/gmatlogo.png') }}" class="flogo"/>
					<img src="{{ asset('/assets/img/gmaclogo.png') }}" class="flogo"/>
			</div>
    @endsection
