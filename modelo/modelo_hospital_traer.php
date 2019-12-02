<?php

function getHospital(){
//Realiza conexion con la base de datos.
    $conn = getConexion();
    $sql="
        SELECT th.id_turno as id_turno, hos.nombre as nombre, th.turnos as turnos, th.fecha as fecha
        FROM `turno_hospital` as th
        INNER JOIN hospital as hos on hos.id_hospital = th.id_hospital
        WHERE th.turnos > 0
    ";

    $result= mysqli_query($conn,$sql) or die("Error al consultar los turnos de hospitales.");

    $hospitales = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {

            $hospital['id_turno'] =  $row["id_turno"];
            $hospital['nombre'] =  $row["nombre"];
            $hospital['turnos'] =  $row["turnos"];
            $hospital['fecha'] = $row["fecha"];
            $hospitales[] = $hospital;

        }

    }

    return $hospitales;
}

?>