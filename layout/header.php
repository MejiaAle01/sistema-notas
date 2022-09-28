	<header>
		<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
					<ol class="navbar-nav d-flex me-auto p-2 breadcrumb">
						<li class="breadcrumb-item fs-5 text-white text-decoration-underline"> Inicio </li>
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
									<li><a class="dropdown-item text-center text-white" href="../../login/cerrar_sesion.php"> Cerrar sesión </a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</header>