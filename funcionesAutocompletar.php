<?php 
include_once "estacionamiento.php";


//$listadodePatente="\"aaa111\" ,\"abb222\"";
$listadoPatente=estacionamiento::retornarListadoAutocompletar();

$textodelArchivoJS="$(function(){
			  var patentes = [
			   
			   $listadoPatente
			   
			  ];
			  
			  // setup autocomplete function pulling from patentes[] array
			  $('#autocomplete').autocomplete({
			    lookup: patentes,
			    onSelect: function (suggestion) {
			      var thehtml = '<strong>patente: </strong> ' + suggestion.value + ' <br> <strong>ingreso: </strong> ' + suggestion.data;
			      $('#outputcontent').html(thehtml);
			         $('#botonIngreso').css('display','none');
      						console.log('aca llego');
			    }
			  });
			  

			});";
$archivoJS=fopen("js/funcionesEstacionar.js","w");
fwrite($archivoJS, $textodelArchivoJS);
fclose($archivoJS);

?>