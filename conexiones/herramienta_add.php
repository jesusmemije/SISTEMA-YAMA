<?php 

	if (isset($_POST['submit'])) {

		require 'conn.php';

		$idcategoria = $_POST['idcategoria'];
		$nombre = $_POST['nombre'];
		$existencias = $_POST['existencias'];

		$execute = $PDO->prepare("INSERT INTO herramientas VALUES (NULL, :idcategoria, :herramienta, :cantidad, NULL)");

		$result = $execute->execute(array(
			':idcategoria' => $idcategoria,
			':herramienta' => $nombre,
			':cantidad' => $existencias
		));

		if ($result) {
			header('Location: ../herramientas.php?add=success');
		}else{
			header('Location: ../herramientas.php?add=error');
		}

	}else{
		header('Location: ../herramientas.php');
	}
