<?php 
	
	if (isset($_POST['submit'])) {

		require 'conn.php';

		$idusuario = $_POST['idusuario'];
		$execute = $PDO->prepare("DELETE FROM usuarios WHERE idusuario = $idusuario");
		$result = $execute->execute();

		if ($result) {
			header('Location: ../usuarios.php?delete=success');
		}else{
			header('Location: ../usuarios.php?delete=error');
		}

	}else{
		header('Location: ../usuarios.php');
	}

 ?>