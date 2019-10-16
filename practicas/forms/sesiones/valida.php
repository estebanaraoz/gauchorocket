<?php

$usuario = $_POST["user"];
$contrasenia = $_POST["pass"];

if($usuario=="gon" && $contrasenia=="1234"){
  session_start();
  $_SESSION['user']=$usuario;
  header('location:ppal.php');
  exit();
}
else{
  echo "Datos inválidos";
}

 ?>
