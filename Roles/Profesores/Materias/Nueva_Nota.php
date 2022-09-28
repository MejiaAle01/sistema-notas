<?php
  // Llamamos la BD
  include '../../../datos/conexion.php';

  // Recibimos los datos
  $nombre = $_POST['nombreAlumno'];
  $apellido = $_POST['apeAlumno'];
  $grado = $_POST['gradoAlumno'];
  $seccion = $_POST['secAlumno'];
  $subject = $_POST['asigAlumno'];
  $act1 = $_POST['act1'];
  $act2 = $_POST['act2'];
  $act3 = $_POST['act3'];
  $act4 = $_POST['act4'];
  $exam1 = $_POST['exam1'];
  $exam2 = $_POST['exam2'];

  // Operaciones para sacar el promedio
  $materias = (($act1 + $act2)/2)*0.35;
  $materiasu = (($act3 + $act4)/2)*0.35;
  $pos = (($exam1 + $exam2)/2)*0.3;
  $suma_prom = round($materias + $materiasu + $pos, 2);

  // Preparamos la consulta
  $insertar = $cn->prepare("INSERT INTO notas (nombre, apellido, grado, seccion, Materia, act1, act2, act3, act4, PO1, PO2, Promedio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  // Asignamos cada variable a su lugar
  $insertar->bindParam(1, $nombre);
  $insertar->bindParam(2, $apellido);
  $insertar->bindParam(3, $grado);
  $insertar->bindParam(4, $seccion);
  $insertar->bindParam(5, $subject);
  $insertar->bindParam(6, $act1);
  $insertar->bindParam(7, $act2);
  $insertar->bindParam(8, $act3);
  $insertar->bindParam(9, $act4);
  $insertar->bindParam(10, $exam1);
  $insertar->bindParam(11, $exam2);
  $insertar->bindParam(12, $suma_prom);

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
        window.location.href = "../Notas_Profesores.php";
      </script>'
    ;
  }

  // Cerramos la conexion con la BD
  $cn = null;
?>