<?php 
	
	if (isset($_POST['submit'])) {

		require 'conn.php';

		$idrol = $_POST['idrol'];
		$execute = $PDO->prepare("DELETE FROM roles WHERE idrol = $idrol");
		$result = $execute->execute();

		if ($result) {
			header('Location: ../roles.php?delete=success');
		}else{
			header('Location: ../roles.php?delete=error');
		}

	}else{
		header('Location: ../roles.php');
	}

 ?>