
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


$sql = "INSERT INTO usuarios(nombre, apellidos, pais, ciudad, region, direccion, codigo_pais, numero_telefonico, usuario, contraseña) 
VALUES ('$_REQUEST[nombre]', '$_REQUEST[apellidos]', '$_REQUEST[pais]', '$_REQUEST[ciudad]', '$_REQUEST[region]', '$_REQUEST[direccion]', '$_REQUEST[codigo_pais]', '$_REQUEST[numero_telefonico]', '$_REQUEST[usuario]', '$_REQUEST[contraseña]')";


$resultado = mysqli_query($conexion, $sql) or die("Problemas en el select");


if ($resultado) {
     
    echo'Ya estas registrado, <a href="login.html"> volver </a>';
} else {
    echo" Vuelva a intentarlo <a href='registrar.php'>";
}


mysqli_close($conexion);

?>

</div>
</div>
<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>


    </body>