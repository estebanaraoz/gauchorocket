<?php
    $idViaje=$_POST['idViaje'];
    $idCabina=$_POST['cabina'];
    $idServicio=$_POST['servicio'];
    $fecha=$_POST['fecha_vencimiento'];
    $cantAcompanantes=$_POST['cantAcompanantes'];
    $idUsuario=$_SESSION['id_usuario'];

    $conn=getConexion();

	$idPasajeros = array();
	$mensajesError = array();
	$comentarios = array();
	$id_estado_reserva = 2;

    //AGREGAMOS EL USUARIO QUE HACE LA RESERVA, AL ARRAY DE PASAJEROS.
    array_unshift($idPasajeros, $idUsuario);

    /*
     * CONTROL ESTADO FISICO USUARIO
     * */
    $sql = "
                SELECT id_estado_fisico
                FROM pasajero
                WHERE id_usuario = $idUsuario
            ";
    $result = mysqli_query($conn, $sql) or die ("Error al consultar el estado fisico del usuario.");
    if (mysqli_fetch_array($result) == 0) {
        $id_estado_reserva = 1;
        array_unshift($mensajesError,"El pasajero ".$_SESSION["nombre_usuario"]." no ha realizado la revision medica.");
    }

    /*
     * REVISION DE TODOS LOS ACOMPANANTES
     * */
    for ($i = 1; $i-1 < $cantAcompanantes; $i++) {
        $sql = "
            SELECT usu.id_usuario, usu.nombre, usu.email, pas.id_estado_fisico
            FROM usuario usu
            LEFT JOIN pasajero pas ON pas.id_usuario = usu.id_usuario
            WHERE email = \"".$_POST["acompanante".$i]."\" 
        ";

        $result = mysqli_query($conn,$sql);
        if (mysqli_fetch_array($result) > 0){//CONTROL DE ACOMPANANTES
			foreach($result as $row){
                if ($row["email"] == $_SESSION["email_usuario"]){//CONTROL MAIL ACOMPANANTE DISTINTO A MAIL USUARIO LOGEADO
                    array_push($mensajesError, "El mail ".$row["email"]." es el mismo del usuario logeado.");
                }

                if (empty($row["id_estado_fisico"])){//ESTADO FISICO DEL USUARIO ACOMPANANTE
                    $id_estado_reserva = 1;
                    array_push($mensajesError,"El pasajero ".$row["nombre"]." no ha realizado la revision medica.");
                }

                array_push($idPasajeros, $row["id_usuario"]);
            }
        } else {
            array_push($mensajesError, "El mail ".$_POST["acompanante".$i]." no esta asignado a un usuario.");
        }
    }

    /*
     * REVISION DE DISPONIBILIDAD
     * */
    $sql = "
        SELECT asientos_disponibles disponibilidad
        FROM viaje_nave_cabina 
        WHERE id_viaje = $idViaje AND id_cabina = $idCabina
    ";
    $result = mysqli_query($conn, $sql) or die ("Error al consultar la disponibilidad de la cabina.");
    foreach ($result as $row) {
        if ($row["disponibilidad"] < $cantAcompanantes + 1){
            $id_estado_reserva = 6;
            array_push($comentarios, "Se registra la reserva en lista de espera debido a que no hay la suficiente disponibilidad en la cabina deseada. Disponibilidad existente: ".$row["disponibilidad"]." pasajeros.");
        }
    }

    /*
     * COMPROBACION ESTADO DE SALUD DEL PASAJERO
     * */
    foreach ($idPasajeros as $idPasajero) {
        $sql = "
            SELECT *
            FROM pasajero pas
            INNER JOIN viaje_puede_ser_hecho_por vph ON vph.id_estado_fisico = pas.id_estado_fisico
            INNER JOIN viaje via ON via.id_tipo_viaje = vph.id_tipo_viaje
            WHERE pas.id_usuario = $idPasajero AND via.id_viaje = $idViaje
        ";
        $result = mysqli_query($conn, $sql) or die ("Error al consultar el estado de salud del pasajero ".$idPasajero.".");
        if (mysqli_fetch_array($result) == 0){
            array_push($mensajesError, "Uno o mas pasajeros no pueden realizar este viaje debido a su condicion de salud.");
        }
    }

    /*
     * COMPROBACION DE ERRORES
     * */
    if (sizeof($mensajesError) == 0){
        /*
         * ALTA DE RESERVA
         * */
		$sql = "
			INSERT INTO reserva (id_viaje, vencimiento_reserva, id_estado_reserva, cod_cabina, cod_servicio)
			VALUES ($idViaje, \"$fecha\", $id_estado_reserva, $idCabina, $idServicio)
		";
		//Alta Reserva
		mysqli_query($conn, $sql) or die ("Error al realizar la reserva.");
		$idReserva = mysqli_insert_id($conn);

        /*
         * MODIFICACION DISPONIBILIDAD
         * */
        $sql ="
            UPDATE viaje_nave_cabina 
            SET asientos_disponibles = (asientos_disponibles-".($cantAcompanantes + 1).") 
            WHERE id_viaje = $idViaje AND id_cabina = $idCabina
        ";
        mysqli_query($conn,$sql);

        /*
         * ASIGNACION DE USUARIOS A VIAJE
         * */
        foreach ($idPasajeros as $idPasajero) {
            $sql = "
				INSERT INTO usuario_hace_reserva
				VALUES ($idReserva, $idPasajero) 
			";
            //Alta asignacion acompa;antes a la reserva.
            mysqli_query($conn,$sql)or die("Error al asignar el acompañante $idPasajero a la reserva. $sql");
        }
	}
?>