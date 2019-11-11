<?php
$cant=$_POST['cantidad_de_acompañantes'];
	if($cant>0){
while($n<$cant){
    $n++;
include('formAcompañantes.php');


    }
}else{
    include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
    $conn = getConexion();
    
    header("Location:misReservas.php");
    exit();
}
?>