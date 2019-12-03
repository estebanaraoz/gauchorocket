<?php

$conn=getConexion();
$cod=$_POST['id_vuelo'];
$f_salida=$_POST['fecha_salida'];
$f_llegada=$_POST['fecha_llegada'];
$dur=$_POST['duracion'];
$precio=$_POST['precio'];
$tipo=$_POST['tipo_vuelo'];
$origen=$_POST['origen'];
$destino=$_POST['destino'];
$nave=$_POST['nave'];

$query='update viaje';



    $criterio = "";

    if (!empty($f_salida)) {
        $criterio = " set salida_viaje = '$f_salida' ";
    }
    if (!empty($f_llegada)) {
        if (empty($criterio)) {
            $criterio = " set llegada_viaje = '$f_llegada' ";
        } else {
            $criterio .= ", llegada_viaje = '$f_llegada'";
        }
    }
    if (!empty($dur)) {
        if (empty($criterio)) {
            $criterio = " set duracion= '$dur' ";
        } else {
            $criterio .= " , duracion = '$dur'";
        }
    }
    if (!empty($precio)) {
        if (empty($criterio)) {
            $criterio = " set precio= '$precio' ";
        } else {
            $criterio .= " , precio = '$precio'";
        }
    }
    if (!empty($tipo)) {
        if (empty($criterio)) {
            $criterio = " set id_tipo_viaje= '$tipo' ";
        } else {
            $criterio .= " , id_tipo_viaje = '$tipo'";
        }
    }
    if (!empty($origen)) {
        if (empty($criterio)) {
            $criterio = " set id_lugar_origen= '$origen' ";
        } else {
            $criterio .= " , id_lugar_origen = '$origen'";
        }
    }
    if (!empty($destino)) {
        if (empty($criterio)) {
            $criterio = " set id_lugar_destino= '$destino' ";
        } else {
            $criterio .= " , id_lugar_destino = '$destino'";
        }
    }

    $query .= $criterio;
    $query.=" where id_viaje='$cod';";
if (!empty($nave)) {
            $sql = "update viaje_hecho_por set id_nave= '$nave' ";
            $sql.=" where id_viaje='$cod';";
          $result=mysqli_query($conn,$sql)or die();
}

    $result = mysqli_query($conn, $query) or die();


?>