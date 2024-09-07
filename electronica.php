
<?php

session_start();
require 'funciones.php';

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

          

<li class=""> 

  <a class="navbar-brand" href="computadoras.php">Computadoras</a>
  <a class="navbar-brand" href="index.php"></a>
  <a class="navbar-brand" href="index.php"></a>
</li>
          
          
          
<li >
  <a class="navbar-brand" href="celulares.php">Celulares</a>
  <a class="navbar-brand" href="index.php"></a>
  <a class="navbar-brand" href="index.php"></a>
</li>  


<li class="active"> 
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
       
       <h1>Electrónica</h1>
         
       <div class="row">
               <?php
                 require 'vendor/autoload.php';
                 $pelicula = new Kawschool\Electronica;
                 $info_peliculas = $pelicula->mostrar();
                 $cantidad = count($info_peliculas);
                 if($cantidad > 0){
                   for($x =0; $x < $cantidad; $x++){
                     $item = $info_peliculas[$x];
               ?>
                 <div class="col-md-4">
                     <div class="panel panel-default">
                       <div class="panel-heading">
                         <h1 class="text-center titulo-pelicula"><?php print $item['titulo'] ?></h1>  
                       </div>
                       <div class="panel-body">
                         <?php
                             $foto = 'upload/'.$item['foto'];
                             if(file_exists($foto)){
                           ?>
                             <img src="<?php print $foto; ?>" class="img-responsive">
                             <?php }else{?>
                           <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                         <?php }?>
                       </div>

                       <div class="panel-heading">
                         <p class="text-center descripcion-articulo"><?php print $item['descripcion'] ?></p>
                         

                         <div class="panel-heading">
                         <p class="text-center descripcion-articulo"> <b>Envio:</b>Gratis</p>  
                       </div>



                       </div>

                       <div class="panel-heading">
                         <p class="text-center descripcion-articulo"> <b>Precio:</b> $ <?php print $item['precio'] ?></p>  
                       </div>

                       <div class="panel-footer">
                           <a href="carrito.php?id=<?php print $item['id'] ?>" class="btn btn-success btn-block">
                             <span class="glyphicon glyphicon-shopping-cart"></span> Comprar
                           </a>
                       </div>
                     </div>
                 
                 
                 </div>
             <?php
                   }
               }else{?>
                 <h4>NO HAY REGISTROS</h4>
   
             <?php }?>
   
   
   
   
           </div>
         
   




   
     
   




           </div> <!-- /container -->





    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>