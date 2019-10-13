<!DOCTYPE html>
<html>
<head>
	<title></title>
	@include('template.head')
</head>
<body>
	<form method="POST" action="{{ route('postReg') }}">
		{{ csrf_field() }}
		<input type="text" name="name" placeholder="Nama Lengkap" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required="required" value="{{ old('name') }}">
		@if ($errors->has('name'))
		<div class="invalid-feedback">
			{{$errors->first('name')}}
		</div>
		@endif
		<input type="text" name="email" placeholder="Email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required="required" value="{{ old('email') }}">
		@if ($errors->has('email'))
		<div class="invalid-feedback">
			{{$errors->first('email')}}
		</div>
		@endif
		<input type="text" name="username" placeholder="Username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" required="required" value="{{ old('username') }}">
		@if ($errors->has('username'))
		<div class="invalid-feedback">
			{{$errors->first('username')}}
		</div>
		@endif
		<input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" required="required">
		@if ($errors->has('password'))
		<div class="invalid-feedback">
			{{$errors->first('password')}}
		</div>
		@endif
		<input type="password" name="password_conf" class="form-control {{ $errors->has('password_conf') ? 'is-invalid' : '' }}" placeholder="Password Confirmation" required="required">
		@if ($errors->has('password_conf'))
		<div class="invalid-feedback">
			{{$errors->first('password_conf')}}
		</div>
		@endif
		<input type="number" name="level" class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}" placeholder="level" required="required">
		@if ($errors->has('level'))
		<div class="invalid-feedback">
			{{$errors->first('level')}}
		</div>
		@endif
		<button type="submit">submit</button>
	</form>
</body>
</html>