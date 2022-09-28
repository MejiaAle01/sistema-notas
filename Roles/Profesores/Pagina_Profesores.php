<?php

  session_start();

  if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipousuario'])) {
    header('location: ../../login/form_login.php');
  } else {
    if ($_SESSION['tipousuario'] != 'Profesor') {
      header("location: ../../login/form_login.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title> Inicio | Profesores </title>
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
    <section class="container">
      <article class="row row-cols-sm-2 g-4 m-4">
        <div class="col">
          <div class="card text-bg-dark">
            <a class="btn btn-dark fs-4 fw-bold" href="Notas_Profesores.php" role="button">
              <i class="bi-pencil-square" style="font-size: 8rem;">
                <br>
              </i>
              Notas
            </a>
          </div>
        </div>
        <div class="col">
          <div class="card text-bg-dark">
            <a class="btn btn-dark fs-4 fw-bold" href="Alumnos/Alumnos_Profesores.php">
              <i class="bi-file-person" style="font-size: 8rem;">
                <br>
              </i>
              Alumnos
            </a>
          </div>
        </div>
      </article>
    </section>
  </main>
  <?php
    include '../../layout/footer.php';
  ?>
</body>
</html>