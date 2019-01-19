<html>
<head>
	<title>Mi segunda vista en laravel</title>
</head>
<body bgcolor="#FFF">
	<center><p>Esta es mi segunda vista</p></center>
	<?php
		echo "El nombre es: ".$nombre."<br>";
		echo "El apellido es: ".$apellido."<br>";
		echo "El numero de tel es: ".$telefono."<br>";
		echo Session::get('mensaje');
	?>
</body>
</html>
