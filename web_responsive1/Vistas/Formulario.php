<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de contacto</title>
</head>
<body>
	
<fieldset class=" mt-4">
    <legend>Contactanos</legend>

<form method="post" action="#">
<div class="form-group">
	<label for="nombre" class="form-label mt-4">Nombre:</label>
	<input type="text" id="nombre" name="nombre" class="form-control" required><br><br>
</div>
<div class="form-group">
	<label for="apellido" class="form-label mt-4">Apellido:</label>
	<input type="text" id="apellido" name="apellido" class="form-control" required><br><br>
</div>
<div class="form-group">
	<label for="email" class="form-label mt-4">E-mail:</label>
	<input type="email" id="email" name="email" class="form-control" required><br><br>
</div>
	
	<label for="mensaje" class="form-label mt-4">Mensaje:</label><br>
	<textarea id="mensaje" name="mensaje" rows="3" class="form-control" required></textarea><br><br>

	<input type="submit" name="submit" class="btn btn-primary" value="Enviar">
</form>
</fieldset>

<br><br>

<?php
// verificar si el formulario se ha enviado la solicitud HTTP y se puede acceder utilizando la variable global 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// obtener los valores del formulario
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$mensaje = $_POST["mensaje"];

	// mostrar los datos ingresados 
	echo "<h2>Los datos ingresados son:</h2>";
	echo "<p>Nombre: " . $nombre . "</p>";
	echo "<p>Apellido: " . $apellido . "</p>";
	echo "<p>Correo electrónico: " . $email . "</p>";
	echo "<p>Mensaje: " . $mensaje . "</p>";
}
?>



</body>
</html>
