@extends('layout.main')
@section('meta_description','GMAT CAT GMCAT SAT Online Computer Adaptive Tests | Money-back Promise | Batch Size 5 or 7, No Herd Teaching | Unlimited Tests-CATs till 750+ Score. Unlimited Mock CATs till 99%ile')
@section('layouts')
	<center><h3>Sign In</h3></center>
					<br><br>
          <div class="panel-body">
              <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                      <div class="col-md-6">
                          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="col-md-4 control-label">Password</label>

                      <div class="col-md-6">
                          <input id="password" type="password" class="form-control" name="password" required>

                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
													<br/>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
												<label class="checkbox"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
												<br>
												<ul class="list-unstyled">
													<li></li>
													<li><a href="{{ route('password.request') }}">Forgot Your Password?</a></li>
												</ul>
												<br/>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-md-8 col-md-offset-4">
                          <button type="submit" class="btn btn-primary">
                              Sign In
                          </button>
													<br/>
                      </div>
                  </div>
									<div class="form-group">
                      <div class="col-md-8 col-md-offset-4">
												<ul class="list-unstyled">
													<li><h4><b>If you don't have any, <a href="/register">sign up</a> here</b></h4></li>
												</ul>
                      </div>
                  </div>
              </form>
          </div>
        @endsection
