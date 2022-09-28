<?php

	session_start();

	session_unset();

	session_destroy();

	echo 
		'<script>
			alert("Cerrando Sesión...");
			window.location.href = "form_login.php";
		</script>'
	;

?>