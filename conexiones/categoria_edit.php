<?php 

	if (isset($_POST['submit'])) {

		require 'conn.php';

		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$idcategoria = $_POST['idcategoria'];

		$execute = $PDO->prepare("UPDATE categorias SET categoria = :categoria, descripcion = :descripcion WHERE idcategoria = :idcategoria");

		$result = $execute->execute(array(
			':categoria' => $nombre,
			':descripcion' => $descripcion,
			':idcategoria' => $idcategoria,
		));

		if ($result) {
			header('Location: ../categorias.php?edit=success');
		}else{
			header('Location: ../categorias.php?edit=error');
		}

	}else{
		header('Location: ../categorias.php');
	}
