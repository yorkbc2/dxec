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
	
	@yield("imported_content")

	<script src="/js/app.js"></script>
</body>
</html>