<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>View auxiliar para probar rutas</h1>

<form action="ingreso" method="POST">
{{ csrf_field() }}
nomUsuario
<input type="text" name="txUsu">
Contraseña
<input type="text" name="txCont">
<input type="submit" name="">

 </form>



</body>
</html>