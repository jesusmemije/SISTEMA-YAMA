<?php 
	
	if (isset($_POST['idcategoria'])) {

		require 'conn.php';

		$idcategoria = $_POST['idcategoria'];
		$execute = $PDO->prepare("DELETE FROM  categorias WHERE idcategoria = $idcategoria");
		$result = $execute->execute();

		if ($result) {
			header('Location: ../categorias.php?delete=success');
		}else{
			header('Location: ../categorias.php?delete=error');
		}

	}else{
		header('Location: ../categorias.php');
	}

 ?>