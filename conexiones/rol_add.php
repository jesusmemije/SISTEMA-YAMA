<?php 

	if (isset($_POST['submit'])) {

		require 'conn.php';

		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$fecha = date('Y-m-d');

		$execute = $PDO->prepare("INSERT INTO roles VALUES (NULL, :rol, :descripcion, :fecha_creacion)");

		$result = $execute->execute(array(
			':rol' => $nombre,
			':descripcion' => $descripcion,
			':fecha_creacion' => $fecha
		));

		if ($result) {
			header('Location: ../roles.php?add=success');
		}else{
			header('Location: ../roles.php?add=error');
		}

	}else{
		header('Location: ../roles.php');
	}
