<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title> Crear cuenta </title>
	<link rel="stylesheet" href="../assets/css/registro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="contenedor-form2">
		<div class="formulario2">
            <a class="bi-arrow-left" href="form_login.php" title="Regresar" style="font-size: 1.5rem; color: white;"></a>
        	<h2> Crea tu cuenta </h2>
        	<form action="registrar.php" method="POST">
        		<label for="Name"> Ingrese el nombre </label>
                <input type="text" required name="nombre" id="Name">
                <label for="LastName"> Ingrese el apellido </label>
                <input type="text" required name="apellido" id="LastName">
                <label for="User"> Ingrese el usuario </label>
            	<input type="text" required name="usuario" id="User">
            	<label for="P455"> Ingrese la contraseña </label>
            	<input type="password" required name="contra" id="P455" autocomplete="off">
            	<label for="Email"> Ingrese el correo </label>
                <input type="text" required name="correo" id="Email">
                <label for="tipousuario"> Elija su rol </label>
                <select name="tipousuario" id="tipousuario">
                    <option value="Profesor"> Profesor </option>
                    <option value="Alumno"> Alumno </option>
                </select>
            	<!--<input type="hidden" name="tipousuario" value="Alumno">-->
            	<button type="submit" value="Registrarse"> Registrarse </button>
        	</form>
    	</div>
    </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</body>
</html>