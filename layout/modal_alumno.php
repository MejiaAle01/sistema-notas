<!-- Modal -->
<section class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"> Nuevo alumno </h5>
			</div>
			<article class="modal-body">
				<form autocomplete="off" method="POST" action="Nuevo_Alumno.php">
					<div class="row mb-2">
						<label for="nameAlumno" class="col-sm-5 col-form-label"> Nombre del alumno: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nameAlumno" id="nameAlumno" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="apeAlumno" class="col-sm-5 col-form-label"> Apellido del alumno: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="apeAlumno" required id="apeAlumno">
						</div>
					</div>
					<div class="row mb-2">
						<label for="ageAlumno" class="col-sm-5 col-form-label"> Edad: </label>
						<div class="col-sm-6">
							<input type="number" class="form-control" name="edadAlumno" required id="ageAlumno" min="1">
						</div>
					</div>
					<div class="row mb-2">
						<label for="dateAlumno" class="col-sm-5 col-form-label"> Fecha de nacimiento: </label>
						<div class="col-sm-6">
							<input type="date" class="form-control" name="fechaAlumno" id="dateAlumno" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="gradoAlumno" class="col-sm-5 col-form-label"> Grado: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="gradoAlumno" id="gradoAlumno" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="secAlumno" class="col-sm-5 col-form-label"> Sección: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="secAlumno" id="secAlumno" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="dirAlumno" class="col-sm-5 col-form-label"> Dirección: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="dirAlumno" id="dirAlumno" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="telAlumno" class="col-sm-5 col-form-label"> Teléfono: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="telAlumno" id="telAlumno" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="emailAlumno" class="col-sm-5 col-form-label"> Correo: </label>
						<div class="col-sm-6">
							<input type="email" class="form-control" name="emailAlumno" id="emailAlumno" required>
						</div>
					</div>
					<div class="d-flex justify-content-center">
						<input type="submit" class="btn btn-outline-primary" value="Registrar" role="button">
						<button type="button" class="btn btn-outline-secondary ms-2" data-bs-dismiss="modal"> Cerrar </button>
					</div>
				</form>
			</article>
		</div>
	</div>
</section>