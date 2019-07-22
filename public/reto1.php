<?php
require_once __DIR__.'/../vendor/autoload.php';
use Geeks\codec\Cifrado as Cifrado;
//Objeto cifrado
$c=new Cifrado();
$nombreCodificado=$c->codifica("Rachid");
setcookie("Nombre", "Rachid");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Pagina home del proyecto</title>
  </head>
  <body>
  <?php
  include __DIR__.'/../vistas/menu.php';
  ?>
  <div class="content">
  <h1 class="codificado"><?=$nombreCodificado?></h1>
  </div>
  <div class="content formulario">
    <form action="reto2.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Introduce solucion</label>
        <input type="text" name="solucion" class="form-control" id="exampleInputSol" aria-describedby="solHelp">
        <small id="solHelp" class="form-text text-muted">Resuleve el nombre</small>
        <input type="hidden" name="cifrado" value="<?=$nombreCodificado?>">
        <?php
          if(isset($_GET["error"])){
        ?>
        <div class="alert alert-danger" role="alert">
          <?=$_GET["error"]?>
        </div>
        <?php
          }
        ?>
      </div>
      <button type="submit" class="btn btn-primary">RESOLVER</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
