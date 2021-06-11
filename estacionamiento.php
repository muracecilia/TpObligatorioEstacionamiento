<?php
include_once "funcionesEstacionar.php";

class estacionamiento
{
	public static function saludar()
	{
		echo"hola";
	}
	public static function leer()
	{
		//$listadeAutosLeida=array();
		$listadeAutosLeida=leerArchivo("patentes.txt");
		return $listadeAutosLeida;
	}
	
	public static function retornarListadoAutocompletar()
	{
		$arrayPatente=estacionamiento::leer("estacionados");
		$listadoRetorno="";
		foreach($arrayPatente as $datos)
		{
			$listadoRetorno.="\"$datos[0]\",";
		}
		return$listadoRetorno;
	}
	
	public static function CreaTablaEstacionados()
	{
		$listado=estacionamiento::leer();
		$tablaHTML="<h2>Estacionados</h2><table border=1><br>";
		$tablaHTML.="<th>";
		$tablaHTML.="Patente";
		$tablaHTML.="</th>";
		$tablaHTML.="<th>";
		$tablaHTML.="Ingreso";
		$tablaHTML.="</th>";
		$tablaHTML.="<th>";
		$tablaHTML.="Tipo";
		$tablaHTML.="</th>";
		foreach($listado as $auto)
		{
			$tablaHTML.="<tr><td>$auto[0]</td><td>$auto[1]</td><td>$auto[2]</td></tr>";//fila
		}
		$tablaHTML.="</table>";
		$tablaHTML.="<a href='index.php'><input type='button'  value='inicio' /></a>";
		$tablaHTML.="<a href='generarArchivoCSV.php'><input type='button'  value='descarga' /></a>";
		$archivo=fopen("tablaEstacionados.php","w");
		fwrite($archivo, $tablaHTML);
		fclose($archivo);
	}

	public static function leerSalidaAutos()
	{
		$listadeSaldidaAutos=leerArchivo("cobrados.txt");
		return $listadeSaldidaAutos;
	}
	public static function CreaTablaSalidaAutos()
	{
		$listado=estacionamiento::leerSalidaAutos();
		$tablaHTML="<h3>Salida de Autos</h3><table border=1>";
		$tablaHTML.="<th>";
		$tablaHTML.="Patente";
		$tablaHTML.="</th>";
		$tablaHTML.="<th>";
		$tablaHTML.="Ingreso";
		$tablaHTML.="</th>";
		$tablaHTML.="<th>";
		$tablaHTML.="Salida";
		$tablaHTML.="</th>";
		$tablaHTML.="<th>";
		$tablaHTML.="Precio";
		$tablaHTML.="</th>";
		$tablaHTML.="<th>";
		$tablaHTML.="Tipo";
		$tablaHTML.="</th>";

		foreach($listado as $auto)
		{
			$tablaHTML.="<tr><td>$auto[0]</td><td>$auto[1]</td><td>$auto[2]</td><td>$auto[3]</td><td>$auto[4]</td></tr>";//fila

		}
		$tablaHTML.="</table>";
		$tablaHTML.="<a href='index.php'><input type='button'  value='inicio' /></a>";
		$tablaHTML.="<a href='generarArchivoCSV.php'><input type='button'  value='descarga' /></a>";
		$archivo=fopen("tablaSalidaAutos.php","w");
		fwrite($archivo, $tablaHTML);
		fclose($archivo);
		

	}

	public static function GuardarListado($arrayListado)
	{
		$archivo=fopen("estacionados.txt","w");
		foreach($arrayListado as $auto)
		{
			if(isset($auto[1]))
			{
				fwrite($archivo, $auto[0]."=>".$auto[1]."\n");
			}
		}
		fclose($archivo);
	}

}
?>
