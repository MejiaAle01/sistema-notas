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
    <title> Notas | Profesores </title>
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
                <a class="text-white" href="Pagina_Profesores.php"> Inicio </a>
              </li>
              <li class="breadcrumb-item text-white text-decoration-underline"> Notas </li>
            </ol>
            <div class="d-flex">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <button type="button" class="btn btn-lg btn-dark dropdown-toggle" data-bs-toggle="dropdown" data-bd-display="static" data-bs-display="static" aria-expanded="false">
                    <i class="bi-person-circle"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li class="text-center text-white"> 
                      <?php echo $_SESSION['usuario']; ?>
                      <hr class="dropdown-divider bg-white">
                    </li>
                    <li><a class="dropdown-item text-center text-white" href="../../login/cerrar_sesion.php"> Cerrar sesión </a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <section class="container">
        <article class="row row-cols-sm-4 g-4 m-4">
          <div class="col">
            <a class="btn btn-outline-dark fs-5" href="Materias/Notas_Mate.php?materia=<?php echo(base64_encode('Matematicas')); ?>">
              <img class="img-fluid" src="https://economipedia.com/wp-content/uploads/Matematicas-aplicadas-1.jpg" alt="Matematicas" style="width: 210px; height: 210px;">
              <br>
              Matematicas
            </a>
          </div>
          <div class="col">
            <a class="btn btn-outline-dark fs-5" href="Materias/Notas_Lenguaje.php?materia=<?php echo(base64_encode('Lenguaje')); ?>">
              <img class="img-fluid" src="https://img.freepik.com/vector-premium/libros-letras-ingles-conjunto-aprender-leer-lengua-literatura-cuadernos-suministros-escolares-estudio-ilustracion-dibujos-animados-vector-aislado-sobre-fondo-blanco_501069-1601.jpg" alt="Lenguaje" style="width: 210px; height: 210px;">
              <br>
              Lenguaje
            </a>
          </div>
          <div class="col">
            <a class="btn btn-outline-dark fs-5" href="Materias/Notas_Ciencias.php?materia=<?php echo(base64_encode('Ciencias')); ?>">
              <img class="img-fluid" src="https://i.pinimg.com/originals/49/43/32/49433220d86ecabccc2d7275e3c19c0f.jpg" alt="Ciencias" style="width: 210px; height: 210px;">
              <br>
              Ciencias
            </a>
          </div>
          <div class="col">
            <a class="btn btn-outline-dark fs-5" href="Materias/Notas_Sociales.php?materia=<?php echo(base64_encode('Sociales')); ?>">
              <img class="img-fluid" src="https://i.pinimg.com/736x/f1/04/f3/f104f33e5ef1b3054900eb10157266c1.jpg" alt="Sociales" style="width: 210px; height: 210px;">
              <br>
              Sociales
            </a>
          </div>
        </article>
      </section>
    </main>
    <?php
      include '../../layout/footer.php';
    ?>
  </body>
</html>