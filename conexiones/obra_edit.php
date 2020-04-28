<?php 

	if (isset($_POST['submit'])) {

		require 'conn.php';

		$nombre = $_POST['nombre'];
		$idobra = $_POST['idobra'];

		$execute = $PDO->prepare("UPDATE obras SET obra = :obra WHERE idobra = :idobra");

		$result = $execute->execute(array(
			':obra' => $nombre,
			':idobra' => $idobra,
		));

		if ($result) {
			header('Location: ../obras.php?edit=success');
		}else{
			header('Location: ../obras.php?edit=error');
		}

	}else{
		header('Location: ../obras.php');
	}
