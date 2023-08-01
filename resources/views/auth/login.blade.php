<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Log in</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min2167.css?v=3.2.0')}}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<a><b>Admin</b></a>
</div>

<div class="card">
<div class="card-body login-card-body">
<p class="login-box-msg">Sign in to start your session</p>
<form method="POST" action="{{ route('login') }}">
	@csrf
	<div class="input-group mb-3">
		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
		<div class="input-group-append">
			<div class="input-group-text">
				<span class="fas fa-envelope"></span>
			</div>
		</div>
		@error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
	<div class="input-group mb-3">
		<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
		<div class="input-group-append">
			<div class="input-group-text">
				<span class="fas fa-lock"></span>
			</div>
		</div>
		@error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
	</div>
	<div class="row">
	<div class="col-8">
		<div class="icheck-primary">
			<input type="checkbox" id="remember">
			<label for="remember">
			Remember Me
			</label>
		</div>
	</div>

	<div class="col-4">
		<button type="submit" class="btn btn-primary btn-block">Sign In</button>
	</div>
	</div>
</form>
<div class="social-auth-links text-center mb-3">
<p>- OR -</p>
<a href="#" class="btn btn-block btn-primary">
<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
</a>
<a href="#" class="btn btn-block btn-danger">
<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
</a>
</div>

<p class="mb-1">
	@if (Route::has('password.request'))
	    <a class="btn btn-link" href="{{ route('password.request') }}">
	        {{ __('Forgot Your Password?') }}
	    </a>
	@endif
</p>
</div>

</div>
</div>


<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>
</body>
</html>
