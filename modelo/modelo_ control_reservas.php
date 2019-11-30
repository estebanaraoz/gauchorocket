<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
//Realiza conexion con la base de datos.
$conn = getConexion();

$time= date('d/m/y H:i:s');
date_default_timezone_set('America/Argentina/Buenos_Aires');

  $query = " SELECT r.id_reserva as reserva FROM `reserva` as r WHERE r.vencimiento_reserva <='$time'";
	echo $query;
  $resultado1 = mysqli_query($conn,$query)
   or die("Error al realizar la consulta de búsqueda");
  $pasajeros = Array();

  if (mysqli_num_rows($resultado1) > 0) {
		
      while($row = mysqli_fetch_assoc($resultado1)) {
			$rvencida['reserva'] =  $row["reserva"];
          $rvencidas[] = $rvencida;
		  
	  }
			foreach ($rvencidas as $rvencida) {
						
		  $sql = "UPDATE `reserva` SET `id_estado_reserva` = '5' WHERE `reserva`.`id_reserva` = $rvencida[reserva];";
	  mysqli_query($conn, $sql) or die("Error al cambiar estado");
  }
  }
  
?>