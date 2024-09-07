<?php

session_start();
require 'funciones.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    require 'vendor/autoload.php';

    $articulo = new Kawschool\Articulo;
    $computadora = new Kawschool\Computadoras;
    $celular = new Kawschool\Celulares;
    $electronica = new Kawschool\Electronica;

    $resultado = $articulo->mostrarPorId($id);
    $resultado2 = $computadora->mostrarPorId($id);
    $resultado3 = $celular->mostrarPorId($id);
    $resultado4 = $electronica->mostrarPorId($id);

   

    if (!$resultado)
       header('location: index.php');
  
       


       if (isset($_SESSION['carrito'])) {
           if (array_key_exists($id,$_SESSION['carrito'])) {
            actualizarArticulo($id);
               
           }
           else {
            agregarArticulo($resultado, $id);
           } 
           
       }else{
        agregarArticulo($resultado, $id);
       }



       
    } 




 require 'vendor/autoload.php';


 if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    $c=0;
   
     foreach($_SESSION['carrito'] as $indice => $value){
       $c++;
       $total = $value['precio'] * $value['cantidad'];

       $totaldefinitivo = calcularTotal();
   
     }



     

     $conexion= mysqli_connect("localhost", "root","")
     or die("Problemas en la conexion");
     
     mysqli_select_db($conexion, "tienda-online")
     or die("Probemas en la seleccion de la base de datos");
     
     
     $sql = "INSERT INTO pedidos(nombre_cliente, total) 
     VALUES ('$_REQUEST[nombre]', '$totaldefinitivo')";
     
     
     $resultado = mysqli_query($conexion, $sql) or die("Problemas en el select");
     
     
     if ($resultado) {
          
         header ("location: final.php");
     } else {
         echo" Vuelva a intentarlo <a href='registrar.php'>";
     }
     
     
     mysqli_close($conexion);

    }   
   






?>