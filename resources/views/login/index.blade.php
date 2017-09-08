<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

@if(count($errors)>0)
<div class="error">
	@foreach($errors->all() as $error)
	<p>{!! $error !!}</p>
	@endforeach
</div>
@endif
<form method="POST">

	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	User:<input type="text" name="user"><br>
	Pass:<input type="password" name="pass"><br>
	<input type="submit" name="sub" value="Login">
</form>
</body>
</html>