<?php 

session_start();

	if (isset($_POST['submit'])) {

		require 'conn.php';

		$idusuario = $_SESSION['idusuario'];
		$nombre = $_POST['nombre'];
		$fecha = date('Y-m-d');

		$execute = $PDO->prepare("INSERT INTO obras VALUES (NULL, :idusuario, :obra, :fecha_creacion, :nota)");

		$result = $execute->execute(array(
			':idusuario' => $idusuario,
			':obra' => $nombre,
			':fecha_creacion' => $fecha,
			':nota' => ''
		));

		if ($result) {
			header('Location: ../obras.php?add=success');
		}else{
			header('Location: ../obras.php?add=error');
		}

	}else{
		header('Location: ../obras.php');
	}
