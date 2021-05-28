<?php

/*var_dump($_GET);

echo "<br>"; 
var_dump($_POST); */

$mail=$_POST['correo'];
//echo "Su mail es :" . $mail . "<br>";
$clave=$_POST['clave'];
//echo "Su clave es ". $clave . "<br>";
$copiaclave=$_POST['copiaclave'];
//echo "Su copia clave es ". $copiaclave;

//echo "Su mail es: ". $mail."Su clave es ". $clave ."Su copia clave es ". $copiaclave;


if($clave==$copiaclave){
	$renglon="\n".$mail."=>".$clave;//\n ponemos un renglon abajo, separamos los datos con =>
	$archivo=fopen("usuarios1.txt", "a");//abrimos el archivo
	//fwrite($archivo, $clave.$mail);//guardamos los datos en un archivo de texto
	fwrite($archivo, $renglon);
	fclose($archivo);//cerramos el archivo 
}else{
	echo"error en clave";
}

?>


