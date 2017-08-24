<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Ingreso solicidtud</h1>
<form action="solicitud" method="POST">
{{ csrf_field() }}

	Nombre<input type="text" name="nom">
	<br>
	Correo <input type="text" name="mail">
	<br>
	Empresa <input type="text" name="nomEmp">
	<br>
	telefono <input type="text" name="tel">
	<br>
	descripcion <input type="text" name="body">
	<br>
	<input type="submit" name="">

</form>

</body>
</html>