<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
$conn=getConexion();
$cod=$_POST['cod_vuelo'];
$f_salida=$_POST['fecha_salida'];
$f_llegada=$_POST['fecha_llegada'];
$dur=$_POST['duracion'];
$precio=$_POST['precio'];
$tipo=$_POST['tipo_vuelo'];
$origen=$_POST['origen'];
$destino=$_POST['destino'];
echo $destino;
$sql="insert into viaje(id_viaje,salida_viaje,llegada_viaje,duracion,precio,id_tipo_viaje,id_lugar_destino,id_lugar_origen) 
            values(\"$cod\",\"$f_salida\",\"$f_llegada\",\"$dur\",\"$precio\",\"$tipo\",\"$origen\",\"$destino\")";
$result=mysqli_query($conn,$sql) or die($sql);
header("Location:controlador_admin.php");
exit();
?>