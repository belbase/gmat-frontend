@extends('layout.main')
@section('layouts')
	<br/>
			{{-- <div class="index-row"> --}}
				{{-- first column --}}
				<div class="col-md-10 col-md-offset-1" style="height:400px; padding:15px;margin-15px;border-bottom:solid 1px grey;">
					<table class="table table-hover">
						<tr>
							<form id="target" action="/practice/exam/preference" method="post">
							<td>
								<input type="hidden" name="_token" class="token" value="{{ csrf_token() }}">
								<input class="radio hidden" value="2" type="radio" name="preference" checked required/>
								<input type="hidden" name="exam" value="Analytical Writing Assessment (AWA) Mock Test">
								<b style="font-size:20px;">Analytical Writing Assessment (AWA)</b></td>
							<td><button type="submit" class="btn btn-primary" name="button"><b>Start</b></button>	</td>
						</form>
						</tr>
						{{-- <tr>
							<form id="target" action="/practice/exam/preference" method="post">
							<td>
								<input type="hidden" name="_token" class="token" value="{{ csrf_token() }}">
								<input class="radio hidden" value="4" type="radio" name="preference" checked required/>
								<input type="hidden" name="exam" value="Verbal (VB) Mock Test">
								<b style="font-size:20px;">Verbal  (VB)</b></td>
							<td><button type="submit" class="btn btn-primary" name="button"><b>Start</b></button>	</td>
						</form>
						</tr> --}}
					</table>
					<div class="col-md-12 well well-lg">
						The Analytical Writing Assessment (AWA) measures your ability to think critically and to communicate your ideas. During the AWA, you are asked to analyze the reasoning behind a given argument and write a critique of that argument.
					</div>
				</div>
				{{-- </div>{{-- end of index-row --}}
				<div class="col-md-10 col-md-offset-1" style="padding:15px;margin 15px;">
					<center> &copy; Copyrights Edushastra Knowledge House.</center>
				</div>
				{{-- <div class="pull-right">
					<img src="{{ asset('/assets/img/gmatlogo.png') }}" class="flogo"/>
					<img src="{{ asset('/assets/img/gmaclogo.png') }}" class="flogo"/>
			</div> --}}
    @endsection
