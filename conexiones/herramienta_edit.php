<?php 

	if (isset($_POST['submit'])) {

		require 'conn.php';

		$idcategoria = $_POST['idcategoria'];
		$nombre = $_POST['nombre'];
		$existencias = $_POST['existencias'];
		$idherramienta = $_POST['idherramienta'];

		$execute = $PDO->prepare("UPDATE herramientas SET idcategoria = :idcategoria, herramienta = :herramienta, cantidad = :cantidad WHERE idherramienta = :idherramienta");

		$result = $execute->execute(array(
			':idcategoria' => $idcategoria,
			':herramienta' => $nombre,
			':cantidad' => $existencias,
			':idherramienta' => $idherramienta
		));

		if ($result) {
			header('Location: ../herramientas.php?edit=success');
		}else{
			header('Location: ../herramientas.php?edit=error');
		}

	}else{
		header('Location: ../herramientas.php');
	}
