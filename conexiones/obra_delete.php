<?php 
	
	if (isset($_POST['submit'])) {

		require 'conn.php';

		$idobra = $_POST['idobra'];
		$execute = $PDO->prepare("DELETE FROM obras WHERE idobra = $idobra");
		$result = $execute->execute();

		if ($result) {
			header('Location: ../obras.php?delete=success');
		}else{
			header('Location: ../obras.php?delete=error');
		}

	}else{
		header('Location: ../obras.php');
	}

 ?>