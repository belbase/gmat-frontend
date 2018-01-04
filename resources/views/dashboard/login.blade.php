
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <title>Admin Login - EduShastra GMCAT </title>
  <!-- Bootstrap core CSS-->
  <link href='{{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}' rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href='{{ asset("assets/vendor/font-awesome/css/font-awesome.min.css") }}' rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href='{{ asset("assets/css/sb-admin.css") }}' rel="stylesheet">
</head>

<body class="bg-dark">

  <div class="container">
    <div class="mx-auto mt-5">
      <center> <a href="/dashboard"> <img src='{{ asset("/assets/img/logo-white.png") }}' alt="EduShastra GMCAT" class="navbar-brand"> </a> </center>
    </div>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.auth') }}">
          {!! csrf_field() !!}
          <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
            <label class="form-control-label" for="email">Email address</label>
            <input type="email" id="email" class="form-control {{ $errors->has('email') ? 'form-control-danger' : '' }}" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email">
            @if ($errors->has('email'))
                <div class="form-control-feedback"  >
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
          </div>
          <div class="form-group {{ $errors->has('password') ? 'has-danger' : ' ' }}">
            <label class="form-control-label" for="password">Password</label>
            <input type="password" class="form-control {{ $errors->has('password') ? 'form-control-danger' : '' }}" name="password" id="password" placeholder="Password">
            @if ($errors->has('password'))
                <div class="form-control-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
          </div>
          <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <label class="checkbox"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
              </div>
          </div>

          <input type="submit" class="btn btn-primary btn-block" value="Login">
        </form>
        <div class="text-center">
          {{-- <a class="d-block small mt-3" href="/dashboard/register">Register an Account</a>
          <a class="d-block small" href="/dashboard/forgetemail">Forgot Password?</a> --}}
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src='{{ asset("/assets/vendor/jquery/jquery.min.js") }}'></script>
  <script src='{{ asset("/assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}'></script>
  <!-- Core plugin JavaScript-->
  <script src='{{ asset("/assets/vendor/jquery-easing/jquery.easing.min.js") }}'></script>
</body>

</html>
{{--  --}}
{{--  --}}
{{--  --}}
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.auth') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
