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
	function enterRegistro($dato){
		$totaldeCaracteres=strlen($dato);
		if($totaldeCaracteres==5){
			$totaldeCaracteres--;
		}
		return substr($dato, 0,$totaldeCaracteres);
	}

	//lee archivo lo separa y guarda en la matriz
	function leerArchivo($nombreArchivo){
		$matrizdeRetorno=array();//es una matriz temporal. guarda todo el contenido del archivo.
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

	function calcularPrecio($fInicio, $fFin, $tipo){
		$dia=DiferenciaDeFechas($fInicio, $fFin, "%d");
		$horas=DiferenciaDeFechas($fInicio, $fFin, "%H");
		$minutos = DiferenciaDeFechas($fInicio, $fFin, "%i");
		
		$dia=$dia*24*60;
		$horas=$horas*60;
		$tiempo=$minutos+$horas+$dia;
		$total=0;
				
		switch ($tipo) 
		{
			case 'auto':
				$aFrancionHora=3.66;
				$aPrecioxHora=1;      //60/60;
				$aEstadia12=0.28;     //200/720;
				$aEstadia24=0.24;     //350/1440;

				if ($tiempo<=60) //si se quedo 1 hr 3.66
				{
					$total=$aFrancionHora*$tiempo; //multiplico el tiempo por la fraccion de hora
				}else
				{
					if ($tiempo<=720) //si quedo entre una 1 y 12 hrs 60
					{
						$total=$aPrecioxHora*$tiempo;
					}else
					{
						if ($tiempo<=1440)//si quedo entre una 12 y 24 hrs 200
						{
							$total=$aEstadia12*$tiempo;
						}else
						{
							$total=$aEstadia24*$tiempo;// 350
						}
					}
				}
				break;
			
			case 'moto':
				$mFrancionHora=0.91;
				$mPrecioxHora=0.33;    //20/60;
				$mEstadia12=0.08;      //60/720;
				$mEstadia24=0.06;      //70/1140;
				if ($tiempo<=60) 
				{
					$total=$mFrancionHora*$tiempo;
				}else
				{
					if ($tiempo<=720) 
					{
						$total=$mPrecioxHora*$tiempo;
					}else
					{
						if ($tiempo<=1440)
						{
							$total=$mEstadia12*$tiempo;
						}else
						{
							$total=$mEstadia24*$tiempo;
						}
					}
				}
				break;
		}
		return $total;

		//$precioDia=$dia*2400;
		//$precioHoras=$horas*120;
		//$precioMinutos=$minutos*2;
		//$precioFinal=$precioMinutos+$precioHoras+$precioDia;

		//return $precioFinal;

	}

	function mostrarResultados($mTipo, $mPatente,$mFechaInicio, $mFechaFinal, $mPrecio){
		echo "Tipo de Vehiculo: " . $mTipo;
		echo "<br>La patente es: " . $mPatente;
		echo "<br>Fecha de Ingreso: ".$mFechaInicio;
		echo "<br>Fecha de Salida: ".$mFechaFinal;
		echo "<br>Tiempo de Estadia: " .DiferenciaDeFechas($mFechaInicio, $mFechaFinal, "%d Día, %H Horas, %i minutos") . "<br>" ;
		echo "<br>------Precios-------";
		echo "<br><br> Auto:";
		echo "<br>Precio por Fracción:       $   3,66";
		echo "<br>Precio por Hora:           $  60,00";
		echo "<br>Precio por Estadia 12 hrs: $ 200;00";
		echo "<br>Precio por Estadia 14 hrs: $ 350;00";
		echo "<br> Moto:";
		echo "<br>Precio por Fracción:       $  0,91";
		echo "<br>Precio por Hora:           $ 20,00";
		echo "<br>Precio por Estadia 12 hrs: $ 60;00";
		echo "<br>Precio por Estadia 14 hrs: $ 70;00"; 

		echo "<br><br>El Total Abonar es : $" . $mPrecio."<br>";

	}

	date_default_timezone_set("America/Argentina/Buenos_Aires");
?>