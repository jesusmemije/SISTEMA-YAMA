<?php 

	if (isset($_POST['submit'])) {

		require 'conn.php';

		$idobra = $_POST['idobra'];
		$idherramienta = $_POST['idherramienta'];
		$cantidad = $_POST['cantidad'];

		$execute = $PDO->prepare("INSERT INTO materiales_obra VALUES (NULL, :idobra, :idherramienta, :cantidad)");

		$result = $execute->execute(array(
			':idobra' => $idobra,
			':idherramienta' => $idherramienta,
			':cantidad' => $cantidad
		));

		if ($result) {
			header('Location: ../obras.php?add=success');
		}else{
			header('Location: ../obras.php?add=error');
		}

	}else{
		header('Location: ../obras.php');
	}
