<?php
	include "funcionesEstacionar.php";

	$patente=$_POST['patente'];
	$tipo=$_POST['tipo'];

	if(isset($patente)){
		$hora=date("Y-m-d H:i");
		$renglon="\n".$patente."=>".$hora."=>".$tipo;
		Guardar($renglon, "patentes.txt");
		include "usarMetodos.php";

		include"funcionesAutocompletar.php";
		
		header("Location: index.php");

	}else{
		echo"error en patente";
	}


?>