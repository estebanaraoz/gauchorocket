<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
if(isset($_POST['eliminar'])){
$conn=getConexion();
$n=$_POST['nave'];
$v=$_POST['id_vuelo'];

$sql="delete from viaje_hecho_por where id_viaje=\"$v\" and id_nave=\"$n\";";
$sql.="delete from viaje where id_viaje=\"$v\";";
$result=mysqli_multi_query($conn,$sql) or die($v);

header("Location:controlador_admin.php");
exit();
}



?>