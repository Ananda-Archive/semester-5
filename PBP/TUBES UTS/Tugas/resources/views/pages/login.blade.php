<!DOCTYPE html>
<html>
<head>
	<title></title>
	@include('template.head')
</head>
<body>
	<form method="POST" action="{{ route('postLogin') }}">
		{{ csrf_field() }}
		<input type="text" name="username" placeholder="Username" required="required">
		<input type="password" name="password" placeholder="Password" required="required">
	</form>
</body>
</html>