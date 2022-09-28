<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');

  session_start();

  if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipousuario'])) {
    header('location: ../../../login/form_login.php');
  } else {
    if ($_SESSION['tipousuario'] != 'Profesor') {
      header("location: ../../../login/form_login.php");
    }
  }

  //Incluimos el archivo de la conexion a la BD
  include '../../../datos/conexion.php';

  if (isset($_GET['materia'])) {
    $materiaselect = base64_decode($_GET['materia']);

    //Consulta a la base de datos
    $consulta = $cn->prepare("SELECT * FROM notas WHERE Materia = ?");
    $consulta->bindParam(1, $materiaselect, PDO::PARAM_STR);
    $consulta->execute();
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title> Notas | Ciencias </title>
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
            <li class="breadcrumb-item"> 
              <a href="../Notas_Profesores.php" class="text-white"> Notas </a>
            </li>
            <li class="breadcrumb-item text-white text-decoration-underline"> Ciencias </li>
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
      <button type="button" class="btn btn-outline-dark mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi-pencil-fill"></i> Nueva nota </button>
      <table class="table table-bordered table-dark table-striped">
        <thead class="table-light">
          <tr>
            <th scope="col"> ID</th>
            <th scope="col"> Nombre </th>
            <th scope="col"> Apellido </th>
            <th scope="col"> Grado </th>
            <th scope="col"> Sección </th>
            <th scope="col"> Materia </th>
            <th scope="col"> Act1 </th>
            <th scope="col"> Act2 </th>
            <th scope="col"> Act3 </th>
            <th scope="col"> Act4 </th>
            <th scope="col"> Exam1 </th>
            <th scope="col"> Exam2 </th>
            <th scope="col"> Promedio </th>
            <th scope="col"> Opciones </th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 0;
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
              $IDN = $fila['ID'];
              $nombre = $fila['nombre'];
              $apellido = $fila['apellido'];
              $grado = $fila['grado'];
              $seccion = $fila['seccion'];
              $materia = $fila['Materia'];
              $act1 = $fila['act1'];
              $act2 = $fila['act2'];
              $act3 = $fila['act3'];
              $act4 = $fila['act4'];
              $exam1 = $fila['PO1'];
              $exam2 = $fila['PO2'];
              $prom = $fila['Promedio'];
            $i++;
          ?>
        <tr>
          <td scope="row"><?php echo $IDN; ?></td>
          <td><?php echo $nombre; ?></td>
          <td><?php echo $apellido; ?></td>
          <td><?php echo $grado; ?></td>
          <td><?php echo $seccion; ?></td>
          <td><?php echo $materia; ?></td>
          <td><?php echo $act1; ?></td>
          <td><?php echo $act2; ?></td>
          <td><?php echo $act3; ?></td>
          <td><?php echo $act4; ?></td>
          <td><?php echo $exam1; ?></td>
          <td><?php echo $exam2; ?></td>
          <td><?php echo $prom; ?></td>
          <td>
            <a class="bi-pencil-square link-warning fs-3 m-1" href="Editar_nota.php?Editar=<?php echo(base64_encode($IDN)); ?>&materia=<?php echo(base64_encode($materia)); ?>" title="Editar"></a>
            <a class="bi-trash link-danger fs-3 m-1" href="Eliminar_nota.php?Eliminar=<?php echo(base64_encode($IDN)); ?>" title="Eliminar"></a>
          </td>
        </tr>
          <?php } ?>
        </tbody>
      </table>
    </section>
    <?php
      include '../../../layout/modal_nota.php';
    ?>
  </main>
  <?php
    include '../../../layout/footer.php';
  ?>
</body>
</html>