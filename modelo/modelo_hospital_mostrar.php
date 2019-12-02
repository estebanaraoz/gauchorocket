<?php

function mostrarHospital($cod){
    $conn = getConexion();
    $sql="select * from turno_hospital where id_hospital='$cod';";

    $res=mysqli_query($conn,$sql);
    $hospitals = Array();
    if (mysqli_num_rows($res) > 0) {

        while($row = mysqli_fetch_assoc($res)) {

            $hospital['id_hospital'] =  $row["id_hospital"];
            $hospital['nombre'] =  $row["nombre_hospital"];
            $hospital['turnos'] =  $row["turnos"];
            $hospitals[] = $hospital;
        }

    }
    return $hospitals;
}
?>