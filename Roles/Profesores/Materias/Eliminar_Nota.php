<?php
	include '../../../datos/conexion.php';

	if (isset($_REQUEST['Eliminar'])) {
		$delN = base64_decode($_REQUEST['Eliminar']);

		$sql = $cn->prepare("DELETE FROM notas WHERE ID = ?");
		$sql->bindParam(1, $delN);
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
					window.location.href = "../Notas_Profesores.php";
				</script>'
			;
		}
	}

	$cn = null;
?>