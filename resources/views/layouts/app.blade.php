
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
 
	<!-- Le titre de la page -->
	<title>@yield("title")</title>
</head>
<body>
    @include('sweetalert::alert')
	@yield("content")

</body>
<script src="{{ asset('bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
</html>
