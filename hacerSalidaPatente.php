 <?php
 	function DiferenciaDeFechas($fecha1 , $fecha2 , $formato = '%i' )
	{
	    $fechaHora1 = date_create($fecha1);
	    $fechaHora2 = date_create($fecha2);
	   
	    $interval = date_diff($fechaHora1, $fechaHora2);
	   
	    return $interval->format($formato);
	}


	//var_dump($_POST);

	$patente=$_POST['patente'];
	
	$listadodePatentes=array();

	$archivo=fopen("patentes.txt","r");

	while (!feof($archivo)) {
		$Renglon=fgets($archivo);
		$datosdePatentes=explode("=>", $Renglon);
		if(isset($datosdePatentes[1]))
		{
			$listadodePatentes[]=$datosdePatentes;
		}
	}
	fclose($archivo);



	//var_dump($listadodePatentes);
	$ingreso="no Ingreso";
	foreach ($listadodePatentes as $datos) 
	{
		if($datos[0]==$patente){
			
			$ingreso="Ingreso";

			date_default_timezone_set("America/Argentina/Buenos_Aires");
			$fechaInicio=$datos[1]; //Fecha y hora entrada
			$fechaFinal=date("Y-m-d H:i"); //Fecha y hora Salida

			$minutos = DiferenciaDeFechas($fechaInicio, $fechaFinal, "%i");

			echo "La patente es: " . $patente;
			echo "<br>Fecha de Ingreso: ".$fechaInicio;
			echo "<br>Fecha de Salida: ".$fechaFinal;
			echo "<br>Tiempo de Estadia: " .DiferenciaDeFechas($fechaInicio, $fechaFinal, "%i minutos") . "<br>" ;
			echo "<br>Precio por Minuto: $2"; 

			echo "<br>El Total Abonar es : $" . $minutos*2;

			break;
		}
	}
	if($ingreso=="no Ingreso"){
		echo"ERROR";
	}
?>