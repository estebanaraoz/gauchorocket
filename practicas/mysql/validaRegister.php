<?php

$host = 'localhost';
$usuariodb = 'root';
$clave = '';

$conexion = mysqli_connect($host, $usuariodb, $clave, 'pruebamysql')
          or die ("No se puede conectar al servidor");


if (isset($_POST['register'])) {      // verificamos que se haya presionado el botón ingresar
  // $usuario = $resultado['usuario'];
  // $contrasenia = $resultado['password'];
  $query = "insert into Usuario(usuario, password)
  values('" . $_POST["user"] . "',
  '".$_POST["pass"] ."') ";
  $consulta = mysqli_query($conexion, $query);
  echo $query;
  mysqli_fetch_assoc($consulta);
  // $cantFilas = mysqli_num_rows($consulta);

  // if (isset($_POST['recordar'])) {
  //   setcookie("username", $usuario, time()+1000);
  // }

  // if(isset($_COOKIE['username'])){
  //   $recordado = $_COOKIE['username'];
  // }

  // if($cantFilas > 0){
  //   session_start();
  //   $_SESSION['user'] = $usuario;
  //   //$_SESSION['error'] = "";
  //   header('location:ppal.php');
  //   exit();
  }
  // else {
  //     $error = "<span style='color: red'>Datos incorrectos</span>"."<br><br>";
  //     session_start();
  //     $_SESSION['error'] = $error;
  //     header('location:login.php');
  // }
// }

 ?>
