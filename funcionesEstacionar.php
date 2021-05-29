<?php
	
	//
	function DiferenciaDeFechas($fecha1 , $fecha2 , $formato = '%i' )
	{
	    $fechaHora1 = date_create($fecha1);
	    $fechaHora2 = date_create($fecha2);
	   
	    $interval = date_diff($fechaHora1, $fechaHora2);
	   
	    return $interval->format($formato);
	}

	//Guarda las patentes
	function Guardar($renglon, $nombreArchivo){
		$archivo=fopen($nombreArchivo, "a");
		fwrite($archivo, $renglon);
		fclose($archivo);
	}

	//saca el enter del final de Fecha de Inicio
	function enterFechaInicio($dato){
		$totaldeCaracteres=strlen($dato);
		if($totaldeCaracteres==17){
			$totaldeCaracteres--;
		}
		return substr($dato, 0,$totaldeCaracteres);
	}

	//
	function leerArchivo($nombreArchivo){
		$matrizdeRetorno=array();//es una matriz temporal. guarda todo el contenido del archivo para guardar.
		$archivo=fopen($nombreArchivo,"r");

		while (!feof($archivo)) {
			$Renglon=fgets($archivo);//fgets lee el renglon
			$datosdePatentes=explode("=>", $Renglon);
			if(isset($datosdePatentes[1]))
			{
				$matrizdeRetorno[]=$datosdePatentes;
			}
		}
		fclose($archivo);
		return $matrizdeRetorno;
	}
	//crea nuevamente el archivo en blancos.
	function crarArchivo($nombreArchivo){
		$archivo=fopen($nombreArchivo, "w");
		fwrite($archivo, "");
		fclose($archivo);
	}

?>