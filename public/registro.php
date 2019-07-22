<?php
require_once __DIR__.'/../vendor/autoload.php';
    $error=null;
    if(isset($_POST["action"])){
        if(!isset($_POST["email"])||!isset($_POST["pass1"])||!isset($_POST["pass2"])){
            $error="Faltan campos";
        }else{
            if(strlen($_POST["email"])==0){
                $error="Falta el email";
            }elseif(strlen($_POST["pass1"])==0||strlen($_POST["pass2"])==0){
                $error="Falta password";
            }elseif($_POST["pass1"]!=$_POST["pass2"]){
                $error="Las contraseñas no coinciden";
            }else{
                //Realizar la insercion a la DB
                $conexion = new mysqli("localhost", "root", "", "cena");
                if ( $conexion->connect_errno) {
                    $error="Fallo al conectar a MySQL: " . $conexion->connect_error;
                }else{
                    $salt="CursoPHPConPakuchi";
                    $passCodificado=crypt($_POST["pass1"],$salt);
                    $sql="INSERT INTO usuario (email, pass, role)
                    VALUES ('".$_POST["email"]."',' $passCodificado', 'USER')";
                    $resultado = $conexion->query($sql);
                    if($resultado==false) $error="Fallo en la insercion";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Document</title>
</head>
<body>
<?php
  include __DIR__.'/../vistas/menu.php';
?>
<div class="content">
    <div class="row">
        <div class="col"></div>
        <div class="col">
        <form action="registro.php" method="post">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="pass1">Contraseña</label>
            <input type="password" class="form-control" name="pass1" id="pass1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="pass2">Repite Contraseña</label>
            <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Password">
        </div>        
        <?php
          if($error!=null){
        ?>
        <div class="alert alert-danger" role="alert">
          <?=$error?>
        </div>
        <?php
          }
        ?>
        <input type="hidden" name="action" value="registrar">
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        <div class="col"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>