<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title> Iniciar Sesión </title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <main class="contenedor-form">
        <div class="formulario">
            <h2> Iniciar Sesión </h2>
            <form action="validar.php" method="POST">
                <label for="usuario"> Ingrese el usuario </label>
                <input type="text" name="usuario" id="usuario" required>
                <label for="contra"> Ingresa la contraseña </label>
                <input type="password" name="contra" id="contra" required autocomplete="off">
                <label for="Rol"> Elija su rol </label>
                <select name="tipousuario" arialabelledby="Rol" title="Escoga su rol">
                    <option value="Profesor"> Profesor </option>
                    <option value="Alumno"> Alumno </option>
                </select>
                <button type="submit" value="Iniciar Sesión"> Iniciar Sesión </button>
            </form>
            <p> Eres nuevo, <a href="form_registro.php"> Crea una cuenta. </a></p>
        </div>
    </main>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</body>
</html>