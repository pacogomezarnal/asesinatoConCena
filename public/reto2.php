<?php
require_once __DIR__.'/../vendor/autoload.php';
use Geeks\codec\Cifrado as Cifrado;


if(isset($_POST)){
  print_r($_POST);
  if(!isset($_POST["solucion"])||!isset($_POST["cifrado"])){
    header('Location: reto1.php?error=Falta campo');
  }else{
    if(strlen($_POST["solucion"])==0||strlen($_POST["cifrado"])==0) header('Location: reto1.php?error=La solucion esta vacia');
    //Objeto cifrado
    $c=new Cifrado();
    $nombreCodificado=$c->codifica($_POST["solucion"]);
    if($nombreCodificado==$_POST["cifrado"]){
    }
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Pagina home del proyecto</title>
  </head>
  <body>
  <?php
  include __DIR__.'/../vistas/menu.php';
  ?>
  <div class="content">

  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>