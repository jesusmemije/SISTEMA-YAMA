<?php 

	if (isset($_POST['submit'])) {

		require 'conn.php';

		$idrol = $_POST['idrol'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];

		$execute = $PDO->prepare("UPDATE roles SET rol = :rol, descripcion = :descripcion WHERE idrol = :idrol");

		$result = $execute->execute(array(
			':rol' => $nombre,
			':descripcion' => $descripcion,
			':idrol' => $idrol,
		));

		if ($result) {
			header('Location: ../roles.php?edit=success');
		}else{
			header('Location: ../roles.php?edit=error');
		}

	}else{
		header('Location: ../roles.php');
	}
