<?php
$idViaje=$_POST['idViaje'];
$idCabina=$_POST['cabina'];
$idServicio=$_POST['servicio'];
$fecha=$_POST['fecha_vencimiento'];
$cantAcompanantes=$_POST['cantAcompanantes'];
$idUsuario=$_SESSION['id_usuario'];


echo "ID VIAJE".$idViaje;
echo "</br>";
echo "ID CABINA".$idCabina;
echo "</br>";
echo "ID SERVICIO".$idServicio;
echo "</br>";
echo "FECHA VENCIMIENTO".$fecha;
echo "</br>";
echo "CANTIDAD DE ACOMPANANTES".$cantAcompanantes;
echo "</br>";
echo "ID USUARIO".$idUsuario;

$conn=getConexion();

    $existenErrores = false;
    $isAcompanantesValidos = true;
	$idAcompanantes[] = null;
	$idReserva = 12;
    for ($i = 1; $i-1 < $cantAcompanantes; $i++) {
        echo "</br>Mail acompanante ".$i." ".$_POST["acompanante".$i];
        $sql = "
            SELECT *
            FROM usuario
            WHERE email = \"".$_POST["acompanante".$i]."\" 
        ";

        $result = mysqli_query($conn,$sql);
        if (mysqli_fetch_array($result) > 0){
			foreach($result as $row){
				$idAcompanantes[$i] = $row["id_usuario"];
			}
        } else {
            $isAcompanantesValidos = false;
		}
    }

	if (!$isAcompanantesValidos){$existenErrores = true;}
	
    if ($existenErrores){
        echo "</br>Existen errores</br>
                <button class=\"btn btn-primary\" onclick=\"goBack()\">Regresar</button>
                
                <script>
                function goBack() {
                  window.history.back();
                }
                </script>        
        ";
    } else {
		$sql = "
			INSERT INTO reserva (id_viaje, vencimiento_reserva, id_estado_reserva, cod_cabina, cod_servicio, valor)
			VALUES ($idViaje, \"$fecha\", 1, $idCabina, $idServicio, 100)
		";
		//echo $sql;
		mysqli_query($conn, $sql) or die ("Error al realizar la reserva.");
		$idReserva = mysqli_insert_id($conn);
		
		$sql = "
			INSERT INTO usuario_hace_reserva(id_reserva,id_usuario)
			VALUE ($idReserva, $idUsuario)
		";
		mysqli_query($conn,$sql)or die("Error al asignar usuario a reserva.");
		
		for ($i = 1; $i-1 < $cantAcompanantes; $i++) {
			//echo "</br>Mail acompanante ".$i." ".$_POST["acompanante".$i];
			echo $idAcompanantes[$i];
			
			$sql = "
				INSERT INTO usuario_hace_reserva
				VALUES ($idReserva, $idAcompanantes[$i]) 
			";
			mysqli_query($conn,$sql)or die("Error al asignar el acompañante $idAcompanantes[$i] a la reserva. $sql");
		}
	}
?>