<?php

session_start();

if(isset($_SESSION['user'])){
  echo "Hola ", $_SESSION['user']."<span>, estás logueado correctamente</span>"."<br><br>";
}
else{
  header('location: login.php');
}

echo "<a href='salir.php'>Cerrar sesión</a>";

?>
