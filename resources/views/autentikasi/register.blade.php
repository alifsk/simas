<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

    <!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{{ url('assets/autentikasi/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/autentikasi/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/autentikasi/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/autentikasi/vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/autentikasi/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/autentikasi/vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/autentikasi/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/autentikasi/vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/autentikasi/css/util.cs')}}s">
	<link rel="stylesheet" type="text/css" href="{{ url('assets/autentikasi/css/main.css')}}">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="{{ route('register') }}" method="POST">
					@csrf
					<span class="login100-form-title p-b-32">
						Register
					</span>
                    <span class="txt1 p-b-11">
						Nama
					</span>
					<div class="wrap-input100 validate-input m-b-15" data-validate = "Name is required">
						<input class="input100" type="text" name="name" id="name">
                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
						<span class="focus-input100"></span>
					</div>
                    <span class="txt1 p-b-11">
						Nomer Telepon
					</span>
					<div class="wrap-input100 validate-input m-b-15" data-validate = "Nomer Telepon is required">
						<input class="input100" type="text" name="telp" id="telp">
						<span class="focus-input100"></span>
                        @error('telp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
					</div>
					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-15" data-validate = "Email is required">
						<input class="input100" type="text" name="email" id="email">
						<span class="focus-input100"></span>
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
					</div>
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-15" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
					</div>
                    <span class="txt1 p-b-11">
						Konfirmasi Password
					</span>
					<div class="wrap-input100 validate-input m-b-30" data-validate = "Konfirmasi Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password_confirmation" id="password_confirmation">
						<span class="focus-input100"></span>
                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
					</div>
					<div class="container-login100-form-btn mb-4">
						<button class="login100-form-btn" type="submit" id="register-post">
							Register
						</button>
					</div>
				</form>
				<a href="{{ url('/login') }}"><span class="fa fa-arrow-left"></span> Back to Login</a>
			</div>
			<br/><br/>
		</div>
	</div>

    <!-- Javascript -->
	<script src="{{ url('assets/autentikasi/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ url('assets/autentikasi/vendor/animsition/js/animsition.min.js')}}"></script>
	<script src="{{ url('assets/autentikasi/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ url('assets/autentikasi/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{ url('assets/autentikasi/vendor/select2/select2.min.js')}}"></script>
	<script src="{{ url('assets/autentikasi/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{ url('assets/autentikasi/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{ url('assets/autentikasi/vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{ url('assets/autentikasi/js/main.js')}}"></script>

</body>
</html>
