<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");

function getViajes(){

    //Realiza conexion con la base de datos.
    $conn = getConexion();

    //Realiza consulta de todos los viajes pesistidos en la base de datos.
    $sql = "SELECT * FROM viaje";
    $result = mysqli_query($conn, $sql);

    //Setea la variable que contrendra todos los viajes encontrados.
    $viajes = Array();
    if (mysqli_num_rows($result) > 0) {//Si existen resultados los setea en la variable.

        while($row = mysqli_fetch_assoc($result)) {
            //En cada vuelta del while crea una variable que contiene cada viaje.
            $viaje = Array();
            $viaje['idViaje'] =  $row["id_viaje"];
            $viaje['salidaViaje'] =  $row["salida_viaje"];
            $viaje['llegadaViaje'] =  $row["llegada_viaje"];
            $viaje['duracion'] =  $row["duracion"];
            $viaje['precio'] =  $row["precio"];
            $viaje['idTipoViaje'] =  $row["id_tipo_viaje"];
            $viaje['idLugar'] =  $row["id_lugar"];
            $viajes[] = $viaje;
        }
    }

    mysqli_close($conn);

    return $viajes;

}

function buscarViajesPorId($busqueda){

    //Realiza conexion con la base de datos.
    $conn = getConexion();

    if ($busqueda == "index"){
        mysqli_close($conn);

        return $viajes = Array();
    }

    //Crea variable con el valor de la busqueda.
    $condicional = ' ';
    if ($busqueda){// Solo si existe un valor a buscar realiza la busqueda.
        $condicional = " WHERE id_viaje = $busqueda";
    }

    //Realiza consulta de todos los viajes pesistidos en la base de datos.
    $sql = "SELECT * FROM viaje".$condicional;
    $result = mysqli_query($conn, $sql);

    //Setea la variable que contrendra todos los viajes encontrados.
    $viajes = Array();
    if (mysqli_num_rows($result) > 0) {//Si existen resultados los setea en la variable.

        while($row = mysqli_fetch_assoc($result)) {
            //En cada vuelta del while crea una variable que contiene cada viaje.
            $viaje = Array();
            $viaje['idViaje'] =  $row["id_viaje"];
            $viaje['salidaViaje'] =  $row["salida_viaje"];
            $viaje['llegadaViaje'] =  $row["llegada_viaje"];
            $viaje['duracion'] =  $row["duracion"];
            $viaje['precio'] =  $row["precio"];
            $viaje['idTipoViaje'] =  $row["id_tipo_viaje"];
            $viaje['idLugar'] =  $row["id_lugar"];
            $viajes[] = $viaje;
        }
    }

    mysqli_close($conn);

    return $viajes;

}
?>