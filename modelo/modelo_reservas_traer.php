<?php
    function getReservaPorId($idReserva){
        $conn = getConexion();
        $sql = "
            SELECT res.id_reserva, res.id_viaje, er.estado, nav.nombre nombre_nave, nav.matricula matricula_nave, cab.tipo_cabina, ser.tipo_servicio, res.vencimiento_reserva, SUM(res.id_viaje) pasajeros, SUM((via.precio+cab.precio+ser.precio)) valor
            FROM reserva res
            INNER JOIN estado_reserva er ON er.id_estado_reserva = res.id_estado_reserva
            INNER JOIN cabina cab ON cab.id_cabina = res.cod_cabina
            INNER JOIN servicio ser ON ser.id_servicio = res.cod_servicio
            INNER JOIN usuario_hace_reserva uhr ON uhr.id_reserva = res.id_reserva
            INNER JOIN viaje via ON via.id_viaje = res.id_viaje
            INNER JOIN viaje_nave_cabina vnc ON vnc.id_viaje = res.id_viaje AND vnc.id_cabina = res.cod_cabina
            INNER JOIN nave nav ON nav.id_nave = vnc.id_nave
            WHERE res.id_reserva = $idReserva
            GROUP BY res.id_viaje
        ";
        $reserva = mysqli_query($conn,$sql) or die("Error al consultar la reserva.");

        return $reserva;
    }
?>
