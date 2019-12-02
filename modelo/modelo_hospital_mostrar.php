<?php

function mostrarHospital($cod, $fec){
    $conn = getConexion();
    $sql="
        SELECT th.id_turno as id_turno, hos.nombre as nombre, th.turnos as turnos, th.fecha as fecha
        FROM `turno_hospital` as th
        INNER JOIN hospital as hos on hos.id_hospital = th.id_hospital
        WHERE th.id_turno = ".$cod." AND fecha = \"".$fec."\"
    ";

    $res=mysqli_query($conn,$sql);
    $hospitals = Array();
    if (mysqli_num_rows($res) > 0) {

        while($row = mysqli_fetch_assoc($res)) {

            $hospital['id_turno'] =  $row["id_turno"];
            $hospital['nombre'] =  $row["nombre"];
            $hospital['turnos'] =  $row["turnos"];
            $hospital['fecha'] =  $row["fecha"];
            $hospitals[] = $hospital;
        }

    }
    return $hospitals;
}
?>