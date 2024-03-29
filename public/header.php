<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>GauchoRocket</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">GauchoRocket</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Inicio</a>
      </li>
<?php
    if (isset($_SESSION["id_usuario"])){
        echo "
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"hospital_ver\">Turno Medico</a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"ver_reservas\">Reservas</a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"salir\">Cerrar Sesión</a>
      </li>
        
        ";
    } else {
        echo "
        
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"registro\">Crear Cuenta</a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"login\">Iniciar Sesión</a>
      </li>
        
        ";
    }

?>
      <li class="nav-item">
        <a class="nav-link" href="busqueda">Buscar</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container">
