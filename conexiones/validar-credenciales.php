<?php 
session_start();
require 'conn.php';

$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($email) && !empty($password)) {

	$execute = $PDO->prepare("SELECT idusuario, nombre,apellidos,email,rol FROM usuarios usrs INNER JOIN roles rols ON usrs.idrol = rols.idrol WHERE usrs.email = :email 
		AND usrs.password = :password");

	$execute->execute(array(
		':email' => $email,
		':password' => $password,
	));

	$result = $execute->fetchAll();

	if (count($result) == 1) {

		$idusuario = $result[0]['idusuario'];
		$nombre = $result[0]['nombre'];
		$apellidos = $result[0]['apellidos'];
		$email = $result[0]['email'];
		$rol = $result[0]['rol'];

			$_SESSION['conectado'] = true; //esta conectado//
			$_SESSION['idusuario'] = $idusuario;
			$_SESSION['nombre'] = $nombre;
			$_SESSION['apellidos'] = $apellidos;
			$_SESSION['email'] = $email;
			$_SESSION['rol'] = $rol;
		    // El siguiente key se crea cuando se inicia sesión
			$_SESSION["timeout"] = time();

			echo '{"status":"201","response":[{"nombre":"'.$nombre.'","apellidos":"'.$apellidos.'","email":"'.$email.'","rol":"'.$rol.'"}]}';

		} else { echo '{"status":"404","response":"Las credenciales ingresadas son incorrectas."}'; }

	} else { echo '{"status":"400","response":"Faltan datos"}'; }
	?>