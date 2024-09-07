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



 

?>


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

    <!-- Fixed navbar --> 
    <nav class="navbar navbar-default navbar-fixed-top">
 

      <div class="container">
 
        <div class="navbar-header">
        
       
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
          <a class="navbar-brand" href="index.php">Supreme Tech</a>
          <a class="navbar-brand" href="index.php"></a>
          <a class="navbar-brand" href="index.php"></a>

        </div>
        
        
<div id="navbar" class="navbar-collapse collapse">
  <ul class="nav navbar-nav pull-right">

          

<li> 

  <a class="navbar-brand" href="computadoras.php">Computadoras</a>
  <a class="navbar-brand" href="index.php"></a>
  <a class="navbar-brand" href="index.php"></a>
</li>
          
          
          
<li>
  <a class="navbar-brand" href="celulares.php">Celulares</a>
  <a class="navbar-brand" href="index.php"></a>
  <a class="navbar-brand" href="index.php"></a>
</li>  


<li> 
  <a class="navbar-brand" href="electronica.php">Electrónica</a>
  <a class="navbar-brand" href="index.php"></a>
  <a class="navbar-brand" href="index.php"></a>
</li> 

<li>

  <a href="carrito.php" class="btn navbar-brand">Carrito<span class="badge"><?php print cantidadArticulos();  ?></span></a>
</li> 
            

        
        </ul>
        </div><!--/.nav-collapse -->
        
      </div>
    </nav>

    <div class="container" id="main">

    <table class="table table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Articulo</th>
<th>Foto</th>
<th>Precio</th>
<th>Cantidad</th>
<th>Total</th>
<th></th>
<thead></thead>

<tbody>

<?php

if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
 $c=0;

  foreach($_SESSION['carrito'] as $indice => $value){
    $c++;
    $total = $value['precio'] * $value['cantidad'];



?>

<tr>

<form action="actualizar_carrito.php" method="POST">

<td><?php print $c ?></td>

<td><?php print $value['titulo'] ?> </td>
<td> 
<?php
       $foto = 'upload/'.$value['foto'];
         if(file_exists($foto)){
          ?>
            <img src="<?php print $foto; ?>" width="70">
              <?php }else{?>
                 <img src="assets/imagenes/not-found.jpg" width="70">
                    <?php }?>
</td>

<td>$<?php print $value['precio'] ?> </td>
<td>


<input type="hidden" name="id" value="<?php print $value['id']  ?>">

  <input type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad']  ?>">

</td> 
<td>$
  <?php print $total ?>
</td>

<td>

<button type="submit" class="btn btn-success btn-xs">
<span class="glyphicon glyphicon-refresh">
</button>

<a href="eliminar_carrito.php?id=<?php print $value['id'] ?>" class="btn btn-danger btn-xs">
<span class="glyphicon glyphicon-trash">
</a>


</td>
</form>

</tr>


<?php
}
}else{



?>

<tr>

<td colspan="7">NO HAY PRODUCTOS EN EL CARRITO</td>

</tr>

<?php
}

?>

  </tbody>

  <tfoot>

  <tr>

<td colspan="5" class="text-right">Total</td>
<td>$<?php  print calcularTotal(); ?></td>
<td></td>

  </tr>

  </tfoot>


  <table>


  </table>

<?php

if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
  


?>

<div class="row">
<form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post">
 <h3> Pagar con</h3> <br>
 Agregar una tarjeta <br>

<section>
<input type="radio" name="pago" value="1"> <img src="upload/tarjetas.png" alt=""> <br>

 <br>
<input type="radio" name="pago2" value="2"> <img src="upload/PayPal.png" alt=""> <br>


<input value="Continuar" type="submit" href="#" class="btn btn-success"></a>
 

</section>

</form>
</div>

<?php


if (empty($_POST['submit']) && isset($_POST['pago'])) 
{

  
?>
<form action="finalizar2.php">
<div class="row col-md-4">
<div class="form-group ">


<label>Nombre</label>
<input type="text" class="form-control" name="nombre" required>
</div>



  
<div class="form-group ">
<label>Numero de tarjeta</label>
<input type="text" class="form-control" name="numero_tarjeta" required>
</div>

<div class="form-group ">
<label>Fecha de vencimiento</label>
<input type="text" class="form-control" name="fecha_vencimiento" placeholder="00/00"  required>
</div>

<div class="form-group">
<label>codigo de seguridad</label>
<input type="text" class="form-control" name="codigo_seguridad"  required>
</div>




<button href="#" name="pagar" type="submit" class="btn btn-primary ">Confirmar y pagar</button>




</div>

</div>


    </form>
    </div>
</div>



</form>

<?php
} if (empty($_POST['submit']) && isset($_POST['pago2'])) {
  
  ?>
  <br>
  <a href="https://www.paypal.com/checkoutnow?sessionID=uid_ca9f5ac4f4_mtu6ntq6mde&buttonSessionID=uid_32c787fa00_mtu6ntc6nte&stickinessID=uid_9f448d585f_mtk6mdk6mja&fundingSource=paypal&buyerCountry=DO&locale.x=es_CO&commit=true&client-metadata-id=MTAwMDIwMDI0MDQ5MjgzMTIx&standaloneFundingSource=paypal&branded=true&clientID=AfjD8CKlCiagY3OXl46F4HJKHIP7k2wRU3UDfMSuo52DBiXuc0srow-uyWGeHT0EXd67zADzzkm-5eoy&env=production&sdkMeta=eyJ1cmwiOiJodHRwczovL3d3dy5wYXlwYWwuY29tL3Nkay9qcz9jbGllbnQtaWQ9QWZqRDhDS2xDaWFnWTNPWGw0NkY0SEpLSElQN2syd1JVM1VEZk1TdW81MkRCaVh1YzBzcm93LXV5V0dlSFQwRVhkNjd6QUR6emttLTVlb3kmY29tcG9uZW50cz1idXR0b25zJmN1cnJlbmN5PVVTRCZpbnRlbnQ9YXV0aG9yaXplJmxvY2FsZT1lc19DTyZtZXJjaGFudC1pZD1CU1hGVzJHWEtQRDNMIiwiYXR0cnMiOnsiZGF0YS1hbW91bnQiOiIyMjguMDgiLCJkYXRhLXVpZCI6InVpZF9zcXd1dHRjdW1vbWNkanpib213aWFpaXNjd2ltcG4ifX0&xcomponent=1&version=5.0.271&token=4HD13338B6171510C" 
  name="pagar" type="submit" class="btn btn-primary "> Pagar con PayPal</a>


  <?php
}

?>


</div>



<div class="row">

</div>


<?php

}else {
  echo "";
}

?>

    </div> <!-- /container -->


           <!-- background-color: #0B243B;-->


  





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>


