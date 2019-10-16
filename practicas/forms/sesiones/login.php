<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <?php
      $error="";
      $recordado="";

      if (isset($_POST['ingresar'])) {      // verificamos que se haya presionado el botón ingresar
        $usuario = $_POST["user"];
        $contrasenia = $_POST["pass"];

        if (isset($_POST['recordar'])) {
          setcookie("username", $usuario, time()+1000);
        }

        if(isset($_COOKIE['username'])){
          $recordado = $_COOKIE['username'];
        }

        if($usuario=="gon" && $contrasenia=="1234"){
          session_start();
          $_SESSION['user']=$usuario;
          header('location:ppal.php');
          exit();
        }
        else {
          $error="<span style='color: red'>Datos incorrectos</span>"."<br><br>";
        }
      }
     ?>

  <form class="" action="login.php" method="post">
    <?php echo $error; ?>
    Usuario <input type="text" name="user" value="<?php echo $recordado;?>"> <br>
    Contraseña <input type="password" name="pass" value=""><br><br>
    Recordarme <input type="checkbox" name="recordar" value="1"><br><br>
    <button type="submit" name="ingresar">Ingresar</button>
  </form>
  </body>
</html>
