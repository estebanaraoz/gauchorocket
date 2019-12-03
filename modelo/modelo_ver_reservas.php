<?php
    //Realiza conexion con la base de datos.
    $conn = getConexion();

    $sql = "
        SELECT r.id_estado_reserva idestado, r.id_reserva id_reserva, r.vencimiento_reserva vencimiento, er.estado estado, c.tipo_cabina tipo_cabina, s.tipo_servicio tipo_servicio
        FROM usuario as u  
        INNER JOIN usuario_hace_reserva uhr ON uhr.id_usuario = u.id_usuario 
        INNER JOIN reserva r ON uhr.id_reserva = r.id_reserva 
        INNER JOIN estado_reserva er ON r.id_estado_reserva = er.id_estado_reserva
        INNER JOIN cabina c ON c.id_cabina = r.cod_cabina 
        INNER join servicio s ON s.id_servicio = r.cod_servicio
        WHERE u.id_usuario = ".$_SESSION["id_usuario"]."
        ORDER BY r.id_reserva
    ";
    $result = mysqli_query($conn, $sql) or die("Error al buscar usuario.");

    if (mysqli_num_rows($result) > 0) {

          while($row = mysqli_fetch_assoc($result)) {
              $reserva = getReservaPorId($row["id_reserva"]);
              $precio = null;
              foreach ($reserva as $item) {
                  $precio = $item["valor"];
              }
              //En cada vuelta del while crea una variable que contiene cada viaje.
              $reserva = Array();
              $reserva['idreserva'] =  $row["id_reserva"];
              $reserva['vencimiento'] =  $row["vencimiento"];
              $reserva['estado'] =  $row["estado"];
              $reserva['cabina'] =  $row["tipo_cabina"];
              $reserva['servicio'] =  $row["tipo_servicio"];
              $reserva['precio'] =  $precio;
              $reserva['idestado'] =  $row["idestado"];
              $reservas[] = $reserva;

          }
    }

	function identificarEstado($estado,$valorEstado,$idreserva){
		switch ($estado){
			case 2 :$valor = "<td><a href='pago?idreserva=". $idreserva . "'>Pagar</a></td>";
			break;
			case 3 : $valor ="<td><a href='checkin?idreserva=". $idreserva . "'>Check-in</a></td>";
			break;
			default : $valor = '<td></td>';
		};

		return $valor;
	}
 ?>