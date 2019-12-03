<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");

function getDatoDeNave($id){
    $conexion = getConexion();

    $sql = "Select * from viaje where id_viaje=\"$id\";";

    $result = mysqli_query($conexion, $sql);
    $viajes = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {

            $viaje['id_viaje'] =  $row["id_viaje"];
            $viaje['salida'] =  $row["salida_viaje"];
            $viaje['precio'] =  $row["precio"];
            $viaje['llegada'] =  $row["llegada_viaje"];
            $viaje['duracion'] =  $row["duracion"];
            $viaje['tipo_viaje'] =  $row["id_tipo_viaje"];
            $viaje['lugar_destino'] =  $row["id_lugar_destino"];
            $viaje['lugar_origen'] =  $row["id_lugar_origen"];
            $viajes[] = $viaje;

        }

    }

    return $viajes;
}

function getNaves(){
    $conn=getConexion();
    $sql="select id_nave,tipo_nave from nave;";
    $result=mysqli_query($conn,$sql);
    $naves=Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {

            $nave['id_nave'] =  $row["id_nave"];
            $nave['tipo_nave'] =  $row["tipo_nave"];

            $naves[] = $nave;

        }

    }
    return $naves;

}