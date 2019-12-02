<?php

function getHospital(){
//Realiza conexion con la base de datos.
    $conn = getConexion();
    $sql="select * from turno_hospital;";

    $result= mysqli_query($conn,$sql) or die("Error al consultar los turnos de hospitales.");

    $hospitales = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {

            $hospital['id_hospital'] =  $row["id_hospital"];
            $hospital['nombre'] =  $row["nombre_hospital"];
            $hospital['turnos'] =  $row["turnos"];
            //$hospital['imagen'] = $row["Imagen"];
            $hospitales[] = $hospital;

        }

    }

    return $hospitales;
}

?>