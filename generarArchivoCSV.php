<?php
include "funcionesEstacionar.php";

function generarEstacionados() {
		$arrayTemporal=LeerArchivo("patentes.txt");
		$renglones="";
		foreach ($arrayTemporal as $datos){
			$renglones.=$datos[0].";".$datos[1].";".$datos[2];
		}
		creaArchivocsv("patentes",$renglones);
}

function creaArchivocsv($nombreArchivo,$valores){
	header("Content-Description: File Transfer");
	header("Content-Type: application/force-download");
	header("Content-Disposition: attachment; filename=" . $nombreArchivo. ".csv");
	echo $valores;
}

generarEstacionados();


?>