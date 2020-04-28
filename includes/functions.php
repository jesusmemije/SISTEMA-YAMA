<?php 
	function obtenerFechaEnLetra($formattedFecha){
		$dia= conocerDiaSemanaFecha($formattedFecha);
		$num = date("j", strtotime($formattedFecha));
		$anno = date("Y", strtotime($formattedFecha));
		$mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
		$mes = $mes[(date('m', strtotime($formattedFecha))*1)-1];
		return $dia.', '.$num.'-'.$mes.'-'.$anno;
	}
	function conocerDiaSemanaFecha($formattedFecha) {
		$dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
		$dia = $dias[date('w', strtotime($formattedFecha))];
		return $dia;
	}
 ?>