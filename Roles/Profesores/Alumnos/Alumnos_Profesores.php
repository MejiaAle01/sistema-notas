<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	session_start();

	if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipousuario'])) {
    header('location: ../../login/form_login.php');
  } else {
    if ($_SESSION['tipousuario'] != 'Profesor') {
      header("location: ../../login/form_login.php");
    }
  }

	//Incluimos el archivo de la conexion a la BD
	include '../../../datos/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title> Alumnos | Profesores </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: 'Cabin', sans-serif;">
	<header>
		<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
					<ol class="navbar-nav d-flex me-auto p-2 breadcrumb">
						<li class="breadcrumb-item">
							<a class="text-white" href="../Pagina_Profesores.php"> Inicio </a>
						</li>
						<li class="breadcrumb-item text-white text-decoration-underline"> Alumnos </li>
					</ol>
					<div class="d-flex">
						<ul class="navbar-nav">
							<li class="nav-item dropdown">
								<button type="button" class="btn btn-lg btn-dark dropdown-toggle" data-bs-toggle="dropdown" data-bd-display="static" data-bs-display="static" aria-expanded="false" title="Menu">
									<i class="bi-person-circle"></i>
								</button>
								<ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
									<li class="text-center text-white">
										<?php echo $_SESSION['usuario']; ?>
										<hr class="dropdown-divider bg-white">
									</li>
									<li><a class="dropdown-item text-center text-white" href="../../../login/cerrar_sesion.php"> Cerrar sesión </a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<main>
		<section class="container-fluid table-responsive mt-2">
			<button type="button" class="btn btn-outline-dark mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi-pencil-fill"></i> Nuevo alumno </button>
			<table class="table table-bordered table-dark table-striped">
				<thead class="table-light">
					<tr>
						<th scope="col"> ID </th>
						<th scope="col"> Nombre </th>
						<th scope="col"> Apellido </th>
						<th scope="col"> Edad </th>
						<th scope="col"> Nacimiento </th>
						<th scope="col"> Grado </th>
						<th scope="col"> Sección </th>
						<th scope="col"> Dirección </th>
						<th scope="col"> Teléfono </th>
						<th scope="col"> Correo </th>
						<th scope="col"> Opciones </th>
					</tr>
				</thead>
				<tbody>
					<?php
						//Consulta a la base de datos
						$registros = 35;
						$pagina = 1;
						if (isset($_GET['pagina'])) {
							$pagina = $_GET['pagina'];
						}
						$limit = $registros;
						$offset = ($pagina - 1) * $registros;
						$sql = $cn->query("SELECT COUNT(*) AS conteo FROM alumnos");
						$conteo = $sql->fetchObject()->conteo;

						$paginas = ceil($conteo / $registros);
						$sql = $cn->prepare("SELECT * FROM alumnos LIMIT ? OFFSET ?");
						$sql->bindParam(1, $limit, PDO::PARAM_INT);
						$sql->bindParam(2, $offset, PDO::PARAM_INT);
						$sql->execute();
						while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
							$IDA = $fila['id_alumno'];
							$name = $fila['nombre'];
							$lastname = $fila['apellido'];
							$edad = $fila['edad'];
							$nac = $fila['fecha_nac'];
							$grade = $fila['grado'];
							$section = $fila['seccion'];
							$direction = $fila['direccion'];
							$telephone = $fila['telefono'];
							$email = $fila['correo'];
					?>
				<tr>
					<td scope="row"><?php echo $IDA; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $lastname; ?></td>
					<td><?php echo $edad; ?></td>
					<td><?php echo $nac; ?></td>
					<td><?php echo $grade; ?></td>
					<td><?php echo $section; ?></td>
					<td><?php echo $direction; ?></td>
					<td><?php echo $telephone; ?></td>
					<td><?php echo $email; ?></td>
					<td>
						<a href="Editar_Alumno.php?Editar=<?php echo(base64_encode($IDA)); ?>" class="link-warning bi-person-dash-fill fs-3 m-1" title="Editar"></a>
						<a href="Eliminar_Alumno.php?Eliminar=<?php echo(base64_encode($IDA)); ?>" class="link-danger bi-person-x-fill fs-3 m-1" title="Eliminar"></a>
					</td>
				</tr>
					<?php } ?>
				</tbody>
			</table>
			<nav aria-label="Page navigation example">
				<ul class="pagination">
					<li class="page-item">
						<?php if($pagina > 1) { ?>
						<a class="page-link" href="./Alumnos_Profesores.php?pagina=<?php echo $pagina - 1; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
						<?php } ?>
					<?php for ($x = 1; $x <= $paginas; $x++) { ?>
						<li class="<?php if ($x == $pagina) echo "active"; ?>">
							<a class="page-link" href="./Alumnos_Profesores.php?pagina=<?php echo $x; ?>">
								<?php echo $x; ?>
							</a>
						</li>
					<?php } ?>
					<?php if ($pagina < $paginas) { ?>
						<li>
							<a class="page-link" href="./Alumnos_Profesores.php?pagina=<?php echo $pagina + 1; ?>" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					<?php } ?>
				</ul>
			</nav>
		</section>
		<?php
			include '../../../layout/modal_alumno.php';
		?>
	</main>
	<?php
		include '../../../layout/footer.php';
	?>
</body>
</html>