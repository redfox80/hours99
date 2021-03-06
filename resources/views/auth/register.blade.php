<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hours99</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">
			<div class="col-xl-5 col-lg-6 col-md-4">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
									</div>
									<form class="user" method="POST" action="{{ route('register') }}">
										@csrf

										<div class="form-group form-error">
											<input type="text" class="form-control form-control-user {{ $errors->has('firstname') ? 'is-invalid':''}}" id="exampleFirstName" placeholder="First Name" name="firstname" value="{{ old('firstname') }}">
											@if($errors->has('firstname'))
											<span class="text-danger mt-1">{{ $errors->first('firstname') }}</span>
											@endif
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user {{ $errors->has('lastname') ? 'is-invalid':''}}" placeholder="Last Name" name="lastname" value="{{ old('lastname') }}">
											@if($errors->has('lastname'))
											<span class="text-danger mt-1">{{ $errors->first('lastname') }}</span>
											@endif
										</div>
										<div class="form-group">
											<input type="email" class="form-control form-control-user {{ $errors->has('email') ? 'is-invalid':''}}" id="exampleInputEmail" placeholder="Email Address" name="email" value="{{ old('email') }}">
											@if($errors->has('email'))
											<span class="text-danger mt-1">{{ $errors->first('email') }}</span>
											@endif
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user {{ $errors->has('password') ? 'is-invalid':''}}" id="exampleInputPassword" placeholder="Password" name="password" value="{{ old('password') }}">
											@if($errors->has('password'))
											<span class="text-danger mt-1">{{ $errors->first('password') }}</span>
											@endif
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user {{ $errors->has('password') ? 'is-invalid':''}}" id="exampleRepeatPassword" placeholder="Password Confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
											@if($errors->has('password_confirmation'))
											<span class="text-danger mt-1">{{ $errors->first('password_confirmation') }}</span>
											@endif
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
											Register Account
										</button>
									</form>

									@error('name')
										IT IS NOT RIGHT
									@enderror
									<hr>
{{--									<div class="text-center">--}}
{{--										<a class="small" href="{{ route('forgot-password') }}">Forgot Password?</a>--}}
{{--									</div>--}}
									<div class="text-center">
										<a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

</body>

</html>
