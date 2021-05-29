 <?php
 	include "funcionesEstacionar.php";
	//var_dump($_POST);

	$patente=$_POST['patente'];
	
	//$listadodePatentes=array();
	$listadodePatentes=leerArchivo("patentes.txt");
	//aca funcion lee el archivo y lo coloca en un array



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
			$precio=$minutos*2;
			echo "La patente es: " . $patente;
			echo "<br>Fecha de Ingreso: ".$fechaInicio;
			echo "<br>Fecha de Salida: ".$fechaFinal;
			echo "<br>Tiempo de Estadia: " .DiferenciaDeFechas($fechaInicio, $fechaFinal, "%i minutos") . "<br>" ;
			echo "<br>Precio por Minuto: $2"; 
			echo "<br>El Total Abonar es : $" . $precio;

			
			Guardar("\n".$patente."=>".enterFechaInicio($fechaInicio)."=>".$fechaFinal."=>".$precio,"cobrados.txt");
			break;
		}
	}
	if($ingreso=="no Ingreso"){
		echo"ERROR";
	}else{
		crarArchivo("patentes.txt");//crea el archivo para sobrescribir patente.txt ya exitente.
		foreach ($listadodePatentes as $datos){
			if($datos[0]!=$patente){
				Guardar("\n".$datos[0]."=>".enterFechaInicio($datos[1]),"patentes.txt");
			}
		}
	}
?>