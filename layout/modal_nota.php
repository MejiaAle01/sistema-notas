<!-- Modal -->
<section class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"> Nueva nota </h5>
			</div>
			<article class="modal-body">
				<form autocomplete="off" method="POST" action="Nueva_Nota.php">
					<div class="row mb-2">
						<label for="nameAlumno" class="col-sm-5 col-form-label"> Nombre del alumno: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nombreAlumno" id="nameAlumno" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="apeAlumno" class="col-sm-5 col-form-label"> Apellido del alumno: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="apeAlumno" required id="apeAlumno">
						</div>
					</div>
					<div class="row mb-2">
						<label for="gradoAlumno" class="col-sm-5 col-form-label"> Grado: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="gradoAlumno" required id="gradoAlumno">
						</div>
					</div>
					<div class="row mb-2">
						<label for="secAlumno" class="col-sm-5 col-form-label"> Sección: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="secAlumno" id="secAlumno" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="asigAlumno" class="col-sm-5 col-form-label"> Materia: </label>
						<div class="col-sm-6">
							<select name="asigAlumno" class="form-select" id="asigAlumno">
								<option value="Matematicas"> Matemáticas </option>
								<option value="Lenguaje"> Lenguaje </option>
								<option value="Ciencias"> Ciencias </option>
								<option value="Sociales"> Sociales </option>
							</select>
						</div>
					</div>
					<div class="row mb-2">
						<label for="act1" class="col-sm-5 col-form-label"> Nota de la actividad 1: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="act1" id="act1" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="act2" class="col-sm-5 col-form-label"> Nota de la actividad 2: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="act2" id="act2" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="act3" class="col-sm-5 col-form-label"> Nota de la actividad 3: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="act3" id="act3" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="act4" class="col-sm-5 col-form-label"> Nota de la actividad 4: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="act4" id="act4" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="exam1" class="col-sm-5 col-form-label"> Nota del examen 1: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="exam1" id="exam1" required>
						</div>
					</div>
					<div class="row mb-2">
						<label for="exam2" class="col-sm-5 col-form-label"> Nota del examen 2: </label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="exam2" id="exam2" required>
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