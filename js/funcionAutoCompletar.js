$(function(){
			  var patentes = [ 

			   {value: "aaa111" , data: " 2015-09-16 00:51:17 " }, 
			   {value: "abb222" , data: " 2015-09-16 00:51:17 " }, 
			   {value: "abc333" , data: " 2015-09-16 00:51:17 " }, 
			   
			   
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
			  

			});