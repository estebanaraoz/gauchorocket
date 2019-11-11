<?php
include('modelo_validar_login.php');
if(isset($_SESSION['user'])){
    
      

		echo "<a class='navbar-brand' href='salir.php'>Salir</a>";
    
        include('controlador_reserva.php');
	}
	else{
        echo"hola";
		echo"<a class='navbar-brand' href='CrearSesion.php'>Crea una sesion</a>
		<br>
		<a class='navbar-brand' href='IniciarSesion.php'>Inicie sesion</a>
		<br>";}

?>