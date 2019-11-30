<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/public/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
    //Realiza conexion con la base de datos.
    $conn = getConexion();

        $userCookie= $_SESSION['user']["id_usuario"];
      $sql = "SELECT r.id_estado_reserva as idestado, r.id_reserva as id_reserva, r.vencimiento_reserva as vencimiento,er.estado as  estado , c.tipo_cabina as tipo_cabina ,s.tipo_servicio as tipo_servicio,r.precio FROM usuario_hace_reserva as uhr inner join usuario as u on uhr.id_usuario = u.id_usuario inner join reserva as r on uhr.id_reserva = r.id_reserva inner join estado_reserva as er on r.id_estado_reserva=er.id_estado_reserva
      INNER JOIN cabina as c on c.id_cabina = r.cod_cabina INNER join servicio  as s on s.id_servicio=r.cod_servicio
      WHERE u.id_usuario = '$userCookie' ;";
    $result = mysqli_query($conn, $sql) or die("Error al buscar usuario.");
	 
	 
	 
	 
               
	
				
       
    

      
 ?>