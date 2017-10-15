<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		@if(isset($title))
			{{$title}}
		@else
			DXCommerce
		@endif
	</title>

	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	
	<div id="app">

		<div class="panel-nav">
			@include("admin.layouts.components.navigator")
		</div>

		<div class="panel-wrapper">
			@yield("imported_content")
		</div>
	
	</div>

	<script src="/js/app.js"></script>
</body>
</html>