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

  if (isset($_GET['Editar'])) {
    $editarA = base64_decode($_GET['Editar']);

    $consulta = $cn->prepare("SELECT * FROM alumnos WHERE id_alumno = ?");
    $consulta->bindParam(1, $editarA);
    $consulta->execute();

    $fila = $consulta->fetch(PDO::FETCH_ASSOC);

    $name = $fila['nombre'];
    $ape = $fila['apellido'];
    $edad = $fila['edad'];
    $fecha = $fila['fecha_nac'];
    $grado = $fila['grado'];
    $sec = $fila['seccion'];
    $dir = $fila['direccion'];
    $tel = $fila['telefono'];
    $email = $fila['correo'];
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title> Editar | Alumno </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: 'Cabin', sans-serif;" class="bg-secondary">
  <main class="p-0 m-3 d-flex justify-content-center">
    <form method="POST" class="rounded-3 shadow bg-white" action="">
      <a class="bi-arrow-left-circle fs-3" href="Alumnos_Profesores.php" title="Regresar"></a>
      <h3 class="mb-3 border-bottom border-1 text-center"> Editar alumno </h3>
      <div class="row mb-3">
        <label for="nameA" class="col-sm-6 col-form-label"> Editar nombre: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="nameA" id="nameA" required value="<?php echo $name; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="apeA" class="col-sm-6 col-form-label"> Editar apellido: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="apeA" id="apeA" required value="<?php echo $ape; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="edadA" class="col-sm-6 col-form-label"> Editar edad: </label>
        <div class="col-sm-6">
          <input type="number" class="form-control" name="edadA" id="edadA" required value="<?php echo $edad; ?>" min="1">
        </div>
      </div>
      <div class="row mb-3">
        <label for="dateA" class="col-sm-6 col-form-label"> Fecha de nacimiento:  </label>
        <div class="col-sm-6">
          <input type="date" class="form-control" name="fechaA" id="dateA" required value="<?php echo $fecha; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="gradoA" class="col-sm-6 col-form-label"> Editar grado: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="gradeA" id="gradoA" readonly value="<?php echo $grado; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="secciónA" class="col-sm-6 col-form-label"> Editar sección: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="seccA" id="secciónA" required value="<?php echo $sec; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="direcA" class="col-sm-6 col-form-label"> Editar dirección: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="dirA" id="direc" required value="<?php echo $dir; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="telA" class="col-sm-6 col-form-label"> Editar teléfono: </label>
        <div class="col-sm-6">
          <input type="number" class="form-control" name="telfA" id="telA" required value="<?php echo $tel; ?>">
        </div>
      </div>
      <div class="row">
        <label for="correoA" class="col-sm-5 col-form-label"> Editar email: </label>
        <div class="col-sm-7">
          <input type="email" class="form-control" name="emailA" id="correoA" required value="<?php echo $email; ?>">
        </div>
      </div>
      <div class="d-flex justify-content-center mt-2">
        <button type="submit" class="btn btn-outline-primary" name="actualizar" role="button"> Actualizar </button>
      </div>
    </form>
    <?php
      if (isset($_POST['actualizar'])) {
        $upd_nombre = $_POST['nameA'];
        $upd_apellido = $_POST['apeA'];
        $upd_edad = $_POST['edadA'];
        $upd_fecha = $_POST['fechaA'];
        $upd_grado = $_POST['gradeA'];
        $upd_secc = $_POST['seccA'];
        $upd_dir = $_POST['dirA'];
        $upd_tel = $_POST['telfA'];
        $upd_email = $_POST['emailA'];

        $sql = $cn->prepare("UPDATE alumnos SET nombre = ?, apellido = ?, edad = ?, fecha_nac = ?, grado = ?, seccion = ?, direccion = ?, telefono = ?, correo = ? WHERE id_alumno = ?");
        $sql->bindParam(1, $upd_nombre);
        $sql->bindParam(2, $upd_apellido);
        $sql->bindParam(3, $upd_edad);
        $sql->bindParam(4, $upd_fecha);
        $sql->bindParam(5, $upd_grado);
        $sql->bindParam(6, $upd_secc);
        $sql->bindParam(7, $upd_dir);
        $sql->bindParam(8, $upd_tel);
        $sql->bindParam(9, $upd_email);
        $sql->bindParam(10, $editarA);
        $sql->execute();

        if (!$sql) {
          echo 
            '<script>
              alert("Error al actualizar los datos!");
              window.history.go(-1);
            </script>'
          ;
        } else {
          echo 
            '<script>
              alert("Datos actualizados correctamente!");
              window.location.href = "Alumnos_Profesores.php";
            </script>'
          ;
        }
      }
      $cn = null;
    ?>
  </main>
</body>
</html>