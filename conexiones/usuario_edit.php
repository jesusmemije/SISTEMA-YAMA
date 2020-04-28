<?php 

	if (isset($_POST['submit'])) {

		require 'conn.php';

		$idusuario = $_POST['idusuario'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$correo = $_POST['correo'];
		$contrasena = $_POST['contrasena'];
		$idrol = $_POST['idrol'];

		$execute = $PDO->prepare("UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, email = :correo, password = :contrasena ,idrol = :idrol 
			WHERE idusuario = :idusuario");

		$result = $execute->execute(array(
			':idusuario' => $idusuario,
			':nombre' => $nombre,
			':apellidos' => $apellidos,
			':correo' => $correo,
			':contrasena' => $contrasena,
			':idrol' => $idrol
		));

		if ($result) {
			header('Location: ../usuarios.php?edit=success');
		}else{
			header('Location: ../usuarios.php?edit=error');
		}

	}else{
		header('Location: ../usuarios.php');
	}
