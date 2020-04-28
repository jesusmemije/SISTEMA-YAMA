<?php 
	
	if (isset($_POST['submit'])) {

		require 'conn.php';

		$idherramienta = $_POST['idherramienta'];
		$execute = $PDO->prepare("DELETE FROM  herramientas WHERE idherramienta = $idherramienta");
		$result = $execute->execute();

		if ($result) {
			header('Location: ../herramientas.php?delete=success');
		}else{
			header('Location: ../herramientas.php?delete=error');
		}

	}else{
		header('Location: ../herramientas.php');
	}

 ?>