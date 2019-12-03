<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
//Realiza conexion con la base de datos.
$conn = getConexion();
date_default_timezone_set('America/Argentina/Buenos_Aires');
$time= date('y/m/d H:i:s');

  $query = " SELECT r.id_reserva as reserva FROM `reserva` as r WHERE r.vencimiento_reserva <='$time'";
	
  $resultado1 = mysqli_query($conn,$query)
   or die("Error al realizar la consulta de búsqueda");
			

  if (mysqli_num_rows($resultado1) > 0) {
		
      while($row = mysqli_fetch_assoc($resultado1)) {
			$rvencida['reserva'] =  $row["reserva"];
          $rvencidas[] = $rvencida;  
	  }
			foreach ($rvencidas as $rvencida) {
						
		
	  $sql1 = "UPDATE `reserva` SET `id_estado_reserva` = '5' WHERE `reserva`.`id_reserva` = $rvencida[reserva];";
	  mysqli_query($conn, $sql1) or die("Error al cambiar estado");
	  $sql2 = "DELETE FROM `usuario_hace_reserva` WHERE `id_reserva` = $rvencida[reserva];";
	  mysqli_query($conn, $sql2) or die("Error al cambiar estado");
  }
  }
  
  
  $sql = " SELECT r.id_reserva as idreserva, COUNT(uhr.id_usuario) as cantidad  FROM reserva as r
INNER JOIN usuario_hace_reserva as uhr on r.id_reserva= uhr.id_reserva
WHERE id_estado_reserva = 6
GROUP by r.id_reserva;";
	
  $resultado2 = mysqli_query($conn,$sql)
   or die("Error al realizar la consulta de búsqueda");	
			
  if (mysqli_num_rows($resultado2) > 0) {
	  while($row = mysqli_fetch_assoc($resultado2)) {
			$reserva['idreserva'] =  $row["idreserva"];
			$reserva['cantidad'] =  $row["cantidad"];
          $reservas[] = $reserva;  
		  echo"hola2";
	  }
	  foreach ($reservas as $reserva) {
		  if( $reserva['cantidad']<= buscarDisponibilidad($conn,$reserva['idreserva'])){
			  echo $reserva['idreserva'];
			 $sql = "UPDATE `reserva` SET `id_estado_reserva` = '1' WHERE `reserva`.`id_reserva` = $reserva[idreserva]";
	  mysqli_query($conn, $sql) or die("Error al cambiar estado");  
		  }
		 
	  }  
  }
  
  
  function buscarDisponibilidad ($conn,$idcabina,){
	   $sql = " SELECT COUNT(ntc.id_ubicacion_cabina) 
			FROM nave_tiene_ucabina as ntc 
			INNER JOIN ubicacion_cabina as ub on ub.id_ubicacion_cabina = ntc.id_ubicacion_cabina
			INNER JOIN nave as n on ntc.id_nave = n.id_nave
			INNER JOIN viaje_hecho_por as chp on chp.id_nave=n.id_nave 
			INNER JOIN viaje as v on v.id_viaje = chp.id_nave 
			INNER JOIN reserva as r on r.id_viaje = v.id_viaje
			WHERE r.id_reserva = 1 and r.cod_cabina=ub.id_cabina and ntc.id_ubicacion_cabina not in(
			SELECT urc.id_ubicacion_cabina FROM usuario_reserva_cabina as urc WHERE id_reserva = '$idcabina' )";
	  $result = mysqli_query($conn, $sql) or die("Error al cambiar estado");
	  return $result;
  }

  
  
  
?>