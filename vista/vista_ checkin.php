<?php
    $idreserva = $_GET['idreserva'];
?>
<br><br>
<h2>Check-in</h2>
<form action='checkin?idreserva=<?php echo $idreserva;?>' method='POST'>
    <label for='servicio'>Seleccione pasajero y ubicacion</label>
    <br>
    <select class='custom-select' name='pasajero'>
        <?php
            $pasajeros=getpasajero($idreserva);
            foreach ($pasajeros as $pasajero) {
                echo "
                    <option class='centrated' value='".$pasajero["idusuario"]."'>" .$pasajero['nombre']. "</option>
                ";
            }
        ?>
    </select>

    <br>
    <br>
    <?php
        $cabinas=getubicaciones($idreserva);
        $i=0;
        foreach ($cabinas as $cabina){
            $i++;
            if($i>20){
                $i=0;
                echo "<br><br>";
            $i++;
            }
            $result=getDisponibilidad($idreserva,$cabina['idubicacion']);
            if(mysqli_num_rows($result)> 0){
                echo" <button  value='$cabina[idubicacion]'  class='btn btn-danger' >". $cabina['nombre'] ."</button>";
            } else {
                echo" <button type='submit' name='Ucabina' value='$cabina[idubicacion]'  class='btn btn-success' >". $cabina['nombre'] ."</button>";
            }
        }
    ?>
</form>
    <?php

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
	setRegistUbicacion($pasid,$idreserva,$ubi,$pasnom,$ubinom);

}
echo "<br><br>
     <a href='ver_reservas'><input type='button' class='btn btn-primary' value='Volver'></a>";
?>



		