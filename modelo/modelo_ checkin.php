<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/public/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
//Realiza conexion con la base de datos.
$conn = getConexion();
$idreserva = $_GET['idreserva'];

function verifFaltaCheckin ($idreserva,$conn){
	$query = " SELECT u.id_usuario as idusuario ,u.nombre as nombre 
  FROM usuario_hace_reserva as uhr INNER JOIN usuario as u on u.id_usuario = uhr.id_usuario 
  WHERE uhr.id_reserva= '$idreserva' and u.id_usuario NOT IN (SELECT id_usuario FROM usuario_reserva_cabina WHERE id_reserva = '$idreserva')";

  $resultado = mysqli_query($conn,$query)
   or die("Error al realizar la consulta de búsqueda");
	
}



function getubicaciones($idreserva,$conn){
$sql = "SELECT uc.id_ubicacion_cabina as ubicacion, uc.nombre as nombre FROM nave_tiene_ucabina as ntc 
INNER JOIN ubicacion_cabina as uc on uc.id_ubicacion_cabina = ntc.id_ubicacion_cabina 
INNER JOIN nave as n on n.id_nave = ntc.id_nave 
INNER JOIN viaje_hecho_por as vhp on vhp.id_nave = n.id_nave 
INNER JOIN viaje as v on v.id_viaje = vhp.id_viaje 
INNER JOIN reserva as r on r.id_viaje = v.id_viaje 
WHERE r.id_reserva = '$idreserva' and uc.id_cabina in (SELECT cod_cabina FROM reserva as r WHERE r.id_reserva = '$idreserva' )";
    $result = mysqli_query($conn, $sql) or die("Error al buscar cabinas.");

 if (mysqli_num_rows($result) > 0) {
                    
                  while($row = mysqli_fetch_assoc($result)) {
                      $cabina = Array();
                      $cabina['idubicacion'] =  $row["ubicacion"];
                      $cabina['nombre'] =  $row["nombre"];
                      $cabinas[] = $cabina;      
															}
									}return $cabinas;
							}

function getDisponibilidad($idreserva,$ubicacion,$conn){
	$sql2 = "SELECT id_usuario FROM `usuario_reserva_cabina` as urc
	WHERE  id_lugar in ( SELECT id_lugar FROM viaje_recorrido as vr INNER JOIN reserva as r on r.id_viaje=vr.id_viaje 
	where r.id_reserva = '$idreserva' )
	and id_ubicacion_cabina = '$ubicacion'";
	$result = mysqli_query($conn, $sql2) or die("Error al buscar disponibilidad");
return	$result;
}


 function setRegistUbicacion($pasajero,$idreserva,$conn,$ubicacion,$nompasajero,$nomubicacion){
	$sql1 = "SELECT id_lugar as lugar FROM viaje_recorrido as vr INNER JOIN reserva as r on r.id_viaje=vr.id_viaje 
	where r.id_reserva = '$idreserva'";
	$result1 = mysqli_query($conn, $sql1) or die("Error al buscar lugares");
	while($row = mysqli_fetch_assoc($result1)) {
					$lugar =$row["lugar"];
					$lugares[] = $lugar;
					}
					
				$disponibilidad=getDisponibilidad($idreserva,$ubicacion,$conn);
	
	if (mysqli_num_rows($disponibilidad) > 0) {
		echo "<br><br><div class='alert alert-danger' role='alert'>
  Esa ubicacio ya no se encuentra disponible  </div>";
	}else{
		
		echo "<br><br><div class='alert alert-success' role='alert'>
					reserva exitosa de ".$nomubicacion." para  ".$nompasajero ."</div>";
		foreach ($lugares as $lugar) {
			$query="INSERT INTO `usuario_reserva_cabina`(`id_reserva`, `id_ubicacion_cabina`, `id_usuario`, `id_lugar`) 
		VALUES ('$idreserva','$ubicacion','$pasajero','$lugar')";
		$result3 = mysqli_query($conn, $query) or die("Error al ingresar checkin.");	
	}
	}
	
	
};


function getpasajero($conn,$idreserva){
  $query = " SELECT u.id_usuario as idusuario ,u.nombre as nombre 
  FROM usuario_hace_reserva as uhr INNER JOIN usuario as u on u.id_usuario = uhr.id_usuario 
  WHERE uhr.id_reserva= '$idreserva' and u.id_usuario NOT IN (SELECT id_usuario FROM usuario_reserva_cabina WHERE id_reserva = '$idreserva')";

  $resultado = mysqli_query($conn,$query)
   or die("Error al realizar la consulta de búsqueda");
  $pasajeros = Array();

  if (mysqli_num_rows($resultado) > 0) {
		
      while($row = mysqli_fetch_assoc($resultado)) {

          $pasajero['idusuario'] =  $row["idusuario"];
          $pasajero['nombre'] =  $row["nombre"];
          $pasajeros[] = $pasajero;
      }return $pasajeros;
  }else {
	  $sql = "UPDATE `reserva` SET `id_estado_reserva` = '4' WHERE `reserva`.`id_reserva` = $idreserva;";
	  mysqli_query($conn, $sql) or die("Error al buscar usuario.");
	  header("Location:/controlador/controlador_ver_reservas.php?idreserva=". $idreserva ."" );
    exit();
	  return null;}
}


?>