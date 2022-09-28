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

  if (isset($_GET['Editar']) && isset($_GET['materia'])) {
    $editarN = base64_decode($_GET['Editar']);
    $materiaN = base64_decode($_GET['materia']);

    $consulta = $cn->prepare("SELECT * FROM notas WHERE ID = ? AND Materia = ?");
    $consulta->bindParam(1, $editarN);
    $consulta->bindParam(2, $materiaN);
    $consulta->execute();

    $fila = $consulta->fetch(PDO::FETCH_ASSOC);

    $name = $fila['nombre'];
    $ape = $fila['apellido'];
    $grade = $fila['grado'];
    $section = $fila['seccion'];
    $subject = $fila['Materia'];
    $act1 = $fila['act1'];
    $act2 = $fila['act2'];
    $act3 = $fila['act3'];
    $act4 = $fila['act4'];
    $exam1 = $fila['PO1'];
    $exam2 = $fila['PO2'];
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title> Editar nota </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: 'Cabin', sans-serif;" class="bg-secondary">
  <main class="p-0 m-5 d-flex justify-content-center">
    <form method="POST" class="rounded-3 shadow bg-white" action="">
      <a class="bi-arrow-left-circle fs-3" href="../Notas_Profesores.php" title="Regresar"></a>
      <h3 class="mb-3 border-bottom border-1 text-center"> Editar nota </h3>
      <div class="row mb-3">
        <label for="nameA" class="col-sm-5 ms-1 col-form-label"> Editar nombre: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="nameA" id="nameA" required value="<?php echo $name; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="apeA" class="col-sm-5 ms-1 col-form-label"> Editar apellido: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="apeA" id="apeA" required value="<?php echo $ape; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="gradoA" class="col-sm-5 ms-1 col-form-label"> Editar grado: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="gradoA" id="gradoA" required value="<?php echo $grade; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="secA" class="col-sm-5 ms-1 col-form-label"> Editar sección: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="secA" id="secA" required value="<?php echo $section; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="subjectA" class="col-sm-5 ms-1 col-form-label"> Editar materia: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="subjectA" id="subjectA" readonly value="<?php echo $subject; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="act1" class="col-sm-5 ms-1 col-form-label"> Editar actividad 1: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="act1A" id="act1" required value="<?php echo $act1; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="act2" class="col-sm-5 ms-1 col-form-label"> Editar actividad 2: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="act2A" id="act2" required value="<?php echo $act2; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="act3" class="col-sm-5 ms-1 col-form-label"> Editar actividad 3: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="act3A" id="act3" required value="<?php echo $act3; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="act4" class="col-sm-5 ms-1 col-form-label"> Editar actividad 4: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="act4A" id="act4" required value="<?php echo $act4; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="exam1" class="col-sm-5 ms-1 col-form-label"> Editar examen 1: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="exam1A" id="exam1" required value="<?php echo $exam1; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="exam2" class="col-sm-5 ms-1 col-form-label"> Editar examen 2: </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="exam2A" id="exam2" required value="<?php echo $exam2; ?>">
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-outline-primary" name="actualizar" role="button"> Actualizar </button>
      </div>
    </form>
    <?php
      if (isset($_POST['actualizar'])) {
        $upd_nombre = $_POST['nameA'];
        $upd_apellido = $_POST['apeA'];
        $upd_grade = $_POST['gradoA'];
        $upd_section = $_POST['secA'];
        $upd_subject = $_POST['subjectA'];
        $upd_act1 = $_POST['act1A'];
        $upd_act2 = $_POST['act2A'];
        $upd_act3 = $_POST['act3A'];
        $upd_act4 = $_POST['act4A'];
        $upd_exam1 = $_POST['exam1A'];
        $upd_exam2 = $_POST['exam2A'];

        // Operaciones para sacar un promedio
        $materias = (($upd_act1 + $upd_act2)/2)*0.35;
        $materiasu = (($upd_act3 + $upd_act4)/2)*0.35;
        $pos = (($upd_exam1 + $upd_exam2)/2)*0.3;
        $suma_prom = round($materias + $materiasu + $pos, 2);

        $sql = $cn->prepare("UPDATE notas SET nombre = ?, apellido = ?, grado = ?, seccion = ?, Materia = ?, act1 = ?, act2 = ?, act3 = ?, act4 = ?, PO1 = ?, PO2 = ?, Promedio = ? WHERE ID = ? AND Materia = ?");
        $sql->bindParam(1, $upd_nombre);
        $sql->bindParam(2, $upd_apellido);
        $sql->bindParam(3, $upd_grade);
        $sql->bindParam(4, $upd_section);
        $sql->bindParam(5, $upd_subject);
        $sql->bindParam(6, $upd_act1);
        $sql->bindParam(7, $upd_act2);
        $sql->bindParam(8, $upd_act3);
        $sql->bindParam(9, $upd_act4);
        $sql->bindParam(10, $upd_exam1);
        $sql->bindParam(11, $upd_exam2);
        $sql->bindParam(12, $suma_prom);
        $sql->bindParam(13, $editarN);
        $sql->bindParam(14, $materiaN);
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
              alert("Datos Actualizados Correctamente!");
              window.location.href = "../Notas_Profesores.php";
            </script>'
          ;
        }
      }
      $cn = null;
    ?>
  </main>
</body>
</html>