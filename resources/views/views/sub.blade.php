<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('public/template/style.css')}}">
	<!-- <style type="text/css">
		#wrapper
		{
			width: 1000px;
			height: auto;
			background:yellow;
			margin: 0 auto;
		}
		#header
		{
			height: 300px;
			background:yellow;
		
		}
		#content
		{
			height: 500px;
			background:blue;
		
		}
		#footer
		{
			height: 300px;
			background:black;
		
		}
	</style> -->
</head>

<body>
<div id="wrapper">
	<div id="header">
		@include('views.nhung_view',['mar_content'=>'Khoa hoc LT laravel'])
		@section('sidebar')
			Manh cuong dep trai
		@show
	</div>
	<div id="content">


		@yield('content')
	</div>
	<div id="footer"></div>
</div>
</body>
</html>				