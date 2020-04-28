<?php

	$usuario = 'root';
	$contraseña = '1212';

	try {

		$PDO = new PDO('mysql:host=localhost;dbname=constructora_yama;charset=UTF8', $usuario, $contraseña);

	} catch (PDOException $e) {
		print "¡Error!: " . $e->getMessage() . "<br/>";
		die();
	}

?>