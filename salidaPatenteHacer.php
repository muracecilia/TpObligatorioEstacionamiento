 <?php
 	include "funcionesEstacionar.php";

	$patente=$_POST['patente'];
	
	//aca funcion lee el archivo y lo coloca en un array
	$listadodePatentes=leerArchivo("patentes.txt");
	
	$ingreso="no Ingreso";
	foreach ($listadodePatentes as $datos) 
	{
		if($datos[0]==$patente)
		{
			$ingreso="Ingreso";
		
			$fechaInicio=$datos[1]; //Fecha y hora entrada
			$fechaFinal=date("Y-m-d H:i"); //Fecha y hora Salida

			// funcion calcularPrecio
			$precio=calcularPrecio($fechaInicio,$fechaFinal, enterRegistro($datos[2]));

			//echos Mostrar...
			mostrarResultados($datos[2], $patente,$fechaInicio, $fechaFinal, $precio);
			
			Guardar("\n".$patente."=>".$fechaInicio."=>".$fechaFinal."=>".$precio."=>".enterRegistro($datos[2]),"cobrados.txt");
			
			break;
		}
	}
	if($ingreso=="no Ingreso")
	{
		echo"ERROR";
	}
	else
	{
		crarArchivo("patentes.txt");//crea el archivo para sobrescribir patente.txt ya exitente.
		foreach ($listadodePatentes as $datos)
		{
			if($datos[0]!=$patente)
			{
				Guardar("\n".$datos[0]."=>".$datos[1]."=>".enterRegistro($datos[2]),"patentes.txt");
			}
		}
		include "usarMetodos.php";
	}
?>