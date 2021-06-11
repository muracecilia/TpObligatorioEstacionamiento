$(function(){
			  var patentes = [
			   
			   "lolo1234","ASAS","456qwe","456qwe","236mas","456qwe","titi123","qqq123","sss111","sss111","EEE123","TTT123","TTT123","OOO123",
			   
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