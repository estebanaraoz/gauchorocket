<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <?php
    $recordado="";

    if(isset($_COOKIE['username'])){
      $recordado = $_COOKIE['username'];
    }

     ?>

  <form class="" action="valida.php" method="post">
    <?php
    session_start();
    if (!$_SESSION['error']) {
      $_SESSION['error'] = "";
    }
    echo $_SESSION['error'];
    ?>
    Usuario <input type="text" name="user" value="<?php echo $recordado;?>"> <br>
    Contraseña <input type="password" name="pass" value=""><br><br>
    Recordarme <input type="checkbox" name="recordar" value="1"><br><br>
    <button type="submit" name="ingresar">Ingresar</button>
  </form>
  </body>
</html>
