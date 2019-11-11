<?php

include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
    //Realiza conexion con la base de datos.
    $conn = getConexion();

        if(isset($_POST['login'])){
    $user = $_POST['user'];

      
      $sql = "SELECT r.id_reserva as id_reserva, r.vencimiento_reserva as vencimiento,er.estado as  estado , c.tipo_cabina as tipo_cabina ,s.tipo_servicio as tipo_servicio,r.precio FROM usuario_hace_reserva as uhr inner join usuario as u on uhr.id_usuario = u.id_usuario inner join reserva as r on uhr.id_reserva = r.id_reserva inner join estado_reserva as er on r.id_estado_reserva=er.id_estado_reserva
      INNER JOIN cabina as c on c.id_cabina = r.cod_cabina INNER join servicio  as s on s.id_servicio=r.cod_servicio
       WHERE u.nombre = '$user' ;";
    $result = mysqli_query($conn, $sql) or die("Error al buscar usuario.");}
      

                if (mysqli_num_rows($result) > 0) {
                    
                  while($row = mysqli_fetch_assoc($result)) {
                      //En cada vuelta del while crea una variable que contiene cada viaje.
                      $reserva = Array();
                      $reserva['idreserva'] =  $row["id_reserva"];
                      $reserva['vencimiento'] =  $row["vencimiento"];
                      $reserva['estado'] =  $row["estado"];
                      $reserva['cabina'] =  $row["tipo_cabina"];
                      $reserva['servicio'] =  $row["tipo_servicio"];
                      $reserva['precio'] =  $row["precio"];
                      $reservas[] = $reserva;
                      
                  }
                  // include($_SERVER["DOCUMENT_ROOT"]."/controlador/controlador_viajes.php");

                }else{
                    echo "No hay resultados para la reservas";
                }
       
    

      
 ?>