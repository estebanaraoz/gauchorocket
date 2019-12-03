<?php

//Realiza conexion con la base de datos.
$conn = getConexion();
if(isset($_POST['mostrar'])){
	$fecha=  $_POST['mes'];
	
	if(isset($_POST['ocupación'])){
	tasadeocupacion($conn,$fecha);	
	 }	
	if(isset($_POST['fmensual'])){
		$suma= facturacionmensual($conn,$fecha);
		echo $suma["suma"];}
	if(isset($_POST['masvendida'])){
		 cabinamasvendida($conn,$fecha);}
	if(isset($_POST['fporcliente'])){
		 facturacianporcliente($conn,$fecha);}
}

function tasadeocupacion($conn,$fecha){
}



function facturacionmensual($conn,$fecha){
	$query ="SELECT SUM(precio) as suma , monthname(fecha_pago), year(fecha_pago)
	FROM reserva WHERE EXTRACT(YEAR_MONTH FROM fecha_pago ) = date('$fecha')"  ;
   $resultado=mysqli_query($conn, $query) or die("Error al cambiar estado");
    if (mysqli_num_rows($resultado) > 0) {
	  while($row = mysqli_fetch_assoc($resultado)) {
		
		return $row;
	}}
   
    ;
   
}


function cabinamasvendida($conn,$fecha){
	
}

function facturacianporcliente($conn,$fecha){
	
}




?>