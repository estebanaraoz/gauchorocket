
<br><br>
    <h2>Check-in</h2>
	<?php 
	
	
	echo "<form class='' action='controlador_checkin.php?idreserva=". $idreserva . "'  method='post'> 
            <label for='servicio'>Seleccione pasajero y ubicacion</label>
        <br>
         <select class='custom-select' name='pasajero'>";
            
            
            $pasajeros=getpasajero($conn,$idreserva);
            foreach ($pasajeros as $pasajero) {
              echo "<option class='centrated'  value='$pasajero[idusuario]'>" .$pasajero['nombre']. "</option>";
            }
			
            ?>
        </select>

		<br><br>
<?php
$cabinas=getubicaciones($idreserva,$conn);
$i=0;
foreach ($cabinas as $cabina){
$i++;
if($i>20){
$i=0;
echo "<br><br>";
$i++;
}
 $result=getDisponibilidad($idreserva,$cabina['idubicacion'],$conn);
if(mysqli_num_rows($result)> 0){
echo" <button  value='$cabina[idubicacion]'  class='btn btn-danger' >". $cabina['nombre'] ."</button>";	
}else{
echo" <button type='submit' name='Ucabina' value='$cabina[idubicacion]'  class='btn btn-success' >". $cabina['nombre'] ."</button>";
}
}
echo "</from>";

if(isset($_POST['Ucabina'])){
    $ubi = $_POST['Ucabina'];
	$pasid = $_POST['pasajero'];
    foreach ($pasajeros as $pasajero){
		if($pasajero['idusuario'] == $pasid){
			$pasnom = $pasajero['nombre'];
		}
	}
	foreach ($cabinas as $cabina){
	if($cabina ['idubicacion'] == $ubi){
		$ubinom = $cabina['nombre'];
	}
	}
	setRegistUbicacion($pasid,$idreserva,$conn,$ubi,$pasnom,$ubinom);	

}
echo "<br><br>
     <a href='../controlador/controlador_ver_reservas.php'><input type='button' class='btn btn-primary' value='volver'></a>";
?>



		