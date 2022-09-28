<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	include '../datos/conexion.php';
	session_start();

	// Obtenemos los campos del lado del servidor con los enviados por el metodo POST del formulario.
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST["usuario"]) && isset($_POST["contra"]) && isset($_POST["tipousuario"])) {
			$user = $_POST["usuario"];
			$pass = $_POST["contra"];
			$typeuser = $_POST["tipousuario"];

			/* VERIFICAMOS LOS DATOS, HACIENDO LA CONSULTA A LA BD */
			$sql = $cn->prepare("SELECT * FROM users WHERE Usuario = ?");
			$sql->bindParam(1, $user, PDO::PARAM_STR);
			$sql->execute();
			if ($sql->rowCount() > 0) {
				$rowData = $sql->fetch(PDO::FETCH_ASSOC);
				if (password_verify($pass, $rowData['Contra'])) {
					$_SESSION["usuario"] = $rowData['Usuario'];
					$_SESSION["nombre"] = $rowData['Nombre'];
					$_SESSION["tipousuario"] = $rowData['Tipousuario'];
					switch ($_SESSION["tipousuario"]) {
						case "Profesor":
							echo
								'<script>
									alert("Iniciando sesión...");
									window.location.assign("../Roles/Profesores/Pagina_Profesores.php");
								</script>'
							;
						break;
						case "Alumno":
							echo 
								'<script>
									alert("Iniciando sesión...");
									window.location.assign("../Roles/Alumnos/Pagina_Alumnos.php");
								</script>'
							;
						break;
					}
				} else {
					echo 
						'<script>
							alert("Usuario o contraseña incorrectos!");
							window.history.go(-1);
						</script>'
					;
				}
			} else {
				echo 
					'<script>
						alert("La contraseña no coincide!");
						window.history.go(-1);
					</script>'
				;
			}
		}
	}

	$cn = null;
?>