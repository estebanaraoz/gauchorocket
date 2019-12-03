<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
function getDatos(){
    $conexion = mysqli_connect('127.0.0.1:3307', 'root', '', 'gaucho_rocket')
    or die(mysqli_errno);

    $sql = "Select * from viaje ;";

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

function verificaNaveAVuelo($id){
   $conn=getConexion();
    $sql= "SELECT id_viaje FROM viaje where id_viaje=$id in(select id_viaje from viaje_hecho_por)";
   $result=mysqli_query($conn,$sql);
    $vs = Array();
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {

            $viaje['id_viaje'] =  $row["id_viaje"];



        }

    }

    return $vs;
}
function mostrar($id){
    $conex=getConexion();
    $valor=$id;
if($valor==0){
    return $devol="<a href=#>pagar</a> ";

}else {$devol="";

}
return $devol;
}
?>