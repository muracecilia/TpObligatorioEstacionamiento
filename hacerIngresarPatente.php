<?php


//var_dump($_POST);

$patente=$_POST['patente'];

if(isset($patente)){
	date_default_timezone_set("America/Argentina/Buenos_Aires");
	$hora=date("Y-m-d H:i");

	$renglon="\n".$patente."=>".$hora;
	$archivo=fopen("patentes.txt", "a");
	
	fwrite($archivo, $renglon);
	fclose($archivo);
	header("Location: estacionar.php");
}else{
	echo"error en patente";
}

?>


