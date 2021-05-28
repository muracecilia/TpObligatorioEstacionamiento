 <?php


	/*var_dump($_GET);

	echo "<br>";
	var_dump($_POST);*/

	$mail=$_POST['correo'];
	$clave=$_POST['clave'];
	$listadodeusuarios=array();

	$archivo=fopen("usuario.txt","r");

	while (!feof($archivo)) {// mientras no termine el archivo
		//echo "Renglon: " . fgets($archivo) . "<br>" ;
		$Renglon=fgets($archivo);
		$datosDeUnUsuario=explode("=>", $Renglon);
		if(isset($datosDeUnUsuario[1]))//$datosDeUnUsuario[0]!=" ")
		{
			$listadodeusuarios[]=$datosDeUnUsuario;
		}
		//var_dump($datosDeUnUsuario);
		//echo"<br>";
		/*if($datosDeUnUsuario[0]==$mail){
			if($datosDeUnUsuario[1]==$clave){
				echo "Bienvenido";
			}
		}*/
	}
	fclose($archivo);
	//var_dump($listadodeusuarios);
	$ingreso="no Ingreso";
	foreach ($listadodeusuarios as $datos) 
	{
		if($datos[0]==$mail){
			if($datos[1]==$clave){
				echo"Bienvenido";
				$ingreso="Ingreso";
				break;
			}
		}
	}
	if($ingreso=="no Ingreso"){
		echo"ERROR";
	}
?>


