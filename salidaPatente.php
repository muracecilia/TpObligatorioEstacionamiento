<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">

    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="js/funcionAutoCompletar.js"></script>

    <title>Signin Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<!--link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"   CODIGO ABSOLUTO... NO NO SIRVE!!!--> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
<!--?php
  include "tablaEstacionados.php";
?-->    
<form class="form-signin" action="salidaPatenteTicket.php" method="POST">
  <img class="mb-4" src="https://uxwing.com/wp-content/themes/uxwing/download/07-design-and-development/bootstrap-4.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Salida de Patente</h1>
  
  <input name="patente" type="text" id="autocomplete" class="form-control" placeholder="Ingrese Patente" required autofocus>
  
  <br><br>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Calcular Importe</button>
  <br>
  <p><a class="btn btn-lg btn-block btn-primary" href="index.php" role="button">Volver al Inicio</a></p>
  <br>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
</form>

<!--?php
  include "tablaSalidaAutos.php";
?--> 

  </body>
</html>
