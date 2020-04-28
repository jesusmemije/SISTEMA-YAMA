<?php 

	if (isset($_POST['submit'])) {

		require 'conn.php';

		$idrol = $_POST['idrol'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$correo = $_POST['correo'];
		$contrasena = $_POST['contrasena'];
		$fecha = date('Y-m-d');

		$execute = $PDO->prepare("INSERT INTO usuarios VALUES (NULL, :idrol, :nombre, :apellidos, :email, :password, :fecha_creacion)");

		$result = $execute->execute(array(
			':idrol' => $idrol,
			':nombre' => $nombre,
			':apellidos' => $apellidos,
			':email' => $correo,
			':password' => $contrasena,
			':fecha_creacion' => $fecha
		));

		if ($result) {
			header('Location: ../usuarios.php?add=success');
		}else{
			header('Location: ../usuarios.php?add=error');
		}

	}else{
		header('Location: ../usuarios.php');
	}
