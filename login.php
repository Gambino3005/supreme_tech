
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Supreme Tech</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
  </head>

  <body>
  <div class="container" id="main">
       
       <div class="main-login">


  

<?php

$conexion= mysqli_connect("localhost", "root","")
or die("Problemas en la conexion");

mysqli_select_db($conexion, "tienda-online")
or die("Probemas en la seleccion de la base de datos");


$registros = mysqli_query($conexion, "SELECT id, usuario, contraseña FROM usuarios WHERE usuario ='$_REQUEST[usuario]' and contraseña ='$_REQUEST[contraseña]'") 
or   die("Problemas en el select:".mysql_error()); 

if (isset($_POST['contraseña'])) 
    

if ($reg=mysqlI_fetch_array($registros)) {   
    
    header("Location:finalizar.php");
    
} else {   
    echo "Error, vuelva a intentarlo. <br> <a class='btn btn-success btn-block' href='login.html'>Vorlver</a> "; 
} 

mysqli_close($conexion);

?>

</div>
</div>
<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>


    </body>