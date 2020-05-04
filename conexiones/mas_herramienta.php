<?php 

if (isset($_POST['submit'])) {

	require 'conn.php';

	$idobra = $_POST['idobra'];
	$idherramienta = $_POST['idherramienta'];
	$cantidad = ( int ) $_POST['cantidad'];

	$execute = $PDO->prepare("SELECT cantidad FROM herramientas WHERE idherramienta = :idherramienta");
	$execute->execute(array(
		':idherramienta' => $idherramienta
	));
	$herramienta = $execute->fetchAll();

	if (count($herramienta) > 0) {
		$existencias = ( int ) $herramienta[0]['cantidad'];
	} else {
		header('Location: ../obras.php?add=error-herramienta');
		die();
	}

	if ($cantidad <= $existencias) {

		$execute = $PDO->prepare("INSERT INTO materiales_obra VALUES (NULL, :idobra, :idherramienta, :cantidad)");

		$result = $execute->execute(array(
			':idobra' => $idobra,
			':idherramienta' => $idherramienta,
			':cantidad' => $cantidad
		));

		if ($result) {

			$discount_quantity = $existencias - $cantidad;

			$execute = $PDO->prepare("UPDATE herramientas SET cantidad = :cantidad WHERE idherramienta = :idherramienta");
			$result = $execute->execute(array(
				':cantidad' => $discount_quantity,
				':idherramienta' => $idherramienta,
			));

			header('Location: ../obras.php?add=success');

		}else{
			header('Location: ../obras.php?add=error');
		}

	} else {
		header('Location: ../obras.php?add=warning-inventary');
	}

}else{
	header('Location: ../obras.php');
}
