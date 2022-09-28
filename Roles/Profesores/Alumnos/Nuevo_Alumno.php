<?php
	// Llamamos la BD
	include '../../../datos/conexion.php';

	// Recibimos los datos
	$nameA = $_POST['nameAlumno'];
	$apeA = $_POST['apeAlumno'];
	$edadA = $_POST['edadAlumno'];
	$fechaA = $_POST['fechaAlumno'];
	$gradoA = $_POST['gradoAlumno'];
	$seccA = $_POST['secAlumno'];
	$dirA = $_POST['dirAlumno'];
	$telA = $_POST['telAlumno'];
	$emailA = $_POST['emailAlumno'];

	// Preparamos la consulta
	$insertar = $cn->prepare("INSERT INTO alumnos (nombre, apellido, edad, fecha_nac, grado, seccion, direccion, telefono, correo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

	// Asignamos cada variable a su lugar
	$insertar->bindParam(1, $nameA);
	$insertar->bindParam(2, $apeA);
	$insertar->bindParam(3, $edadA);
	$insertar->bindParam(4, $fechaA);
	$insertar->bindParam(5, $gradoA);
	$insertar->bindParam(6, $seccA);
	$insertar->bindParam(7, $dirA);
	$insertar->bindParam(8, $telA);
	$insertar->bindParam(9, $emailA);

	// Ejecutamos la query para insertar los datos
	$insertar->execute();

	// Validamos los datos
	if (!$insertar) {
		echo 
			'<script>
				alert("Error al ingresar los datos!");
				location.history.go(-1);
			</script>'
		;
	} else {
		echo 
			'<script>
			alert("Datos registrados correctamente!");
			window.location.href = "Alumnos_Profesores.php";
			</script>'
		;
	}

	// Cerramos la conexion con la BD
	$cn = null;
?>