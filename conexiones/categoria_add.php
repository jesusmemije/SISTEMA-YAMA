<?php 

	if (isset($_POST['submit'])) {

		require 'conn.php';

		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$fecha = date('Y-m-d');

		$execute = $PDO->prepare("INSERT INTO categorias VALUES (NULL, :categoria, :descripcion, :fecha_creacion)");

		$result = $execute->execute(array(
			':categoria' => $nombre,
			':descripcion' => $descripcion,
			':fecha_creacion' => $fecha
		));

		if ($result) {
			header('Location: ../categorias.php?add=success');
		}else{
			header('Location: ../categorias.php?add=error');
		}

	}else{
		header('Location: ../categorias.php');
	}
