@extends('layout.main')
@section('layouts')
					<center><h1> Sign Up Here! </h1></center>

          <div class="panel-body">
              <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name" class="col-md-4 control-label">Name</label>

                      <div class="col-md-6">
                          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                          @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                      <div class="col-md-6">
                          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required>

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
                          <input id="password" type="password" class="form-control" name="password" placeholder="Choose Password" required>

                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                      <div class="col-md-6">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        {{-- <center> --}}
                          <button type="submit" class="btn btn-primary">
                              Sign Up
                          </button>
                        {{-- </center> --}}
                      </div>
                  </div>
									<div class="form-group">
                      <div class="col-md-8 col-md-offset-4">
												<ul class="list-unstyled">
													<li><h4><b><a href="/login">Login</a> if You Already Have an Account</b></h4></li>
												</ul>
                      </div>
                  </div>
              </form>
          </div>
        @endsection
