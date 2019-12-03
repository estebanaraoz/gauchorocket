<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
 $conn=getConexion();
 $n=$_POST['nave'];
 $v=$_POST['id_vuelo'];

 $sql="insert into viaje_hecho_por(id_viaje,id_nave) values(\"$v\",\"$n\");";
 $result=mysqli_query($conn,$sql) or die($v);

 header("Location:controlador_admin.php");
 exit();
 ?>