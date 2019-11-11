<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
$conn = getConexion();

if(isset($_POST['ingresar'])){
$user=$_POST['user'];
$mail=$_POST['mail'];
$sql="insert into usuario_hace_reserva(id_reserva,idUsuario) values(\"\");"

}




?>