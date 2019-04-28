<?php
	$conn = new mysqli('localhost', 'root', '', 'control_asistencia');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>
