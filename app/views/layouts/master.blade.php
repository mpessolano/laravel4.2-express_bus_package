<html lang="es">
<head>
	<title>
		@section('titulo')
			Cursos de laravel4
		@show
	</title>
		@section('cabecera')
			<link rel="stylesheet" type="text/css" href="estilo.css">
		@show
</head>
<body>

	@yield('contenido')

	<footer>
		@yield('pie')
	</footer>
	
</body>
</html>
