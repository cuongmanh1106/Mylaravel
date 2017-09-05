<!DOCTYPE html>
<html>
<head>
	<title>MC_LT-laravel</title>
	<style type="text/css">
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
	</style>
</head>

<body>
<div id="wrapper">
	<div id="header"></div>
	<div id="content">
		@section('sidebar')
			Manh cuong dep trai
		@show
		@yield('content')
	</div>
	<div id="footer"></div>
</div>
</body>
</html>