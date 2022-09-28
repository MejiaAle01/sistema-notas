<?php
	session_start();

	if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipousuario'])) {
		header('location: ../../login/form_login.php');
	} else {
		if ($_SESSION['tipousuario'] != 'Alumno') {
			header("location: ../../login/form_login.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title> Inicio | Alumnos </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: 'Cabin', sans-serif;">
	<?php
		include '../../layout/header.php';
	?>

	<!-- Contenido principal de la pagina web -->
	<main>
		<img src="../../assets/img/logo.jpg" alt="Logo de la escuela" class="img-fluid mx-auto d-block" height="150" width="150">
		<h1 class="text-center"> Bienvenidos al Centro Escolar Colonia Las Brisas </h1>
		<section class="container d-flex justify-content-center">
			<a class="btn btn-dark fs-4 fw-bold m-3" href="Notas_Alumnos.php" role="button" title="Consultar notas">
				<i class="bi-pencil-square" style="font-size: 8rem;">
					<br>
				</i>
				Consultar notas
			</a>
		</section>
	</main>

	<?php
		include '../../layout/footer.php';
	?>
</body>
</html>