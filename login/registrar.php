<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	// Incluimos el archivo de conexion a la BD
	include '../datos/conexion.php';

	//Recibir los datos y almacenarlos en variables
	$user = $_POST['usuario'];
	$pass = $_POST['contra'];
	$typeuser = $_POST['tipousuario'];
	$name = $_POST['nombre'];
	$lastname = $_POST['apellido'];
	$email = $_POST['correo'];

	$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

	//Consultar para insertar datos
	$insertar = "INSERT INTO users (Usuario, Contra, Tipousuario, Nombre, Apellido, Correo) VALUES (?, ?, ?, ?, ?, ?)";

	$insertar = $cn->prepare($insertar);

	$insertar->bindParam(1, $user);
	$insertar->bindParam(2, $hashed_password);
	$insertar->bindParam(3, $typeuser);
	$insertar->bindParam(4, $name);
	$insertar->bindParam(5, $lastname);
	$insertar->bindParam(6, $email);

	//Verificamos si el usuario existe
	$verificaruser = $cn->prepare("SELECT * FROM users WHERE Usuario = '$user'");
	$verificaruser->execute();
	if ($verificaruser->fetchColumn() > 0) {
		echo 
			'<script>
				alert("El usuario ya existe");
				window.history.go(-1);
			</script>'
		;
		exit;
	}

	//Verificamos si el correo existe
	$verificarcorreo = $cn->prepare("SELECT * FROM users WHERE Correo = '$email'");
	$verificarcorreo->execute();
	if ($verificarcorreo->fetchColumn() > 0) {
		echo 
			'<script>
				alert("El correo ya existe");
				window.history.go(-1);
			</script>'
		;
		exit;
	}

	// Verificamos si la contraseña existe
	$verificarpass = $cn->query("SELECT * FROM users WHERE Contra = '$pass'");
	if ($verificarpass->rowCount() > 0) {
		$data = $verificarpass->fetch(PDO::FETCH_ASSOC);
		if (password_verify($pass, $data['Contra'])) {
			echo 
				'<script>
					alert("La contraseña ya existe");
					window.history.go(-1);
				</script>'
			;
			exit;
		}
	}

	//Ejecutamos la consulta
	$insertar->execute();
	if (!$insertar) {
		echo 
			'<script>
				alert("Error al registrar usuario");
				window.history.go(-1);
			</script>'
		;
	} else {
		echo 
			'<script>
				alert("Usuario registrado correctamente!");
				window.location.href = "form_registro.php";
			</script>'
		;
	}

	//Cerramos la conexion
	$insertar = null;
	$cn = null;
?>