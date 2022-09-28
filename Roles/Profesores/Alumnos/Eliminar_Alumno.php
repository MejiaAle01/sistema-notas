<?php
	include '../../../datos/conexion.php';

	if (isset($_REQUEST['Eliminar'])) {
		$delA = base64_decode($_REQUEST['Eliminar']);

		$sql = $cn->prepare("DELETE FROM alumnos WHERE id_alumno = ?");
		$sql->bindParam(1, $delA);
		$sql->execute();

		if (!$sql) {
			echo 
				'<script>
					alert("Error al eliminar los datos!");
					window.history.go(-1);
				</script>'
			;
		} else {
			echo 
				'<script>
					alert("Datos eliminados correctamente!");
					window.location.href = "Alumnos_Profesores.php";
				</script>'
			;
		}
	}

	$cn = null;
?>