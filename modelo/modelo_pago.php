<?php
    include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php"); 

 $conn = getConexion();
 $idreserva = $_GET['idreserva'];
 $valida = true;

if(isset($_POST['confirm'])){
    $numtarj = $_POST['numerotarjeta'];
  echo $numtarj;      

if($valida){
    $sql = "UPDATE `reserva` SET `id_estado_reserva` = '3' WHERE `reserva`.`id_reserva` = $idreserva;";
    $result = mysqli_query($conn, $sql) or die("Error al buscar usuario.");}
    
}




?>