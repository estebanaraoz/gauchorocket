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

    $isAcompanantesValidos = true;
    for ($i = 1; $i-1 < $cantAcompanantes; $i++) {
        echo "</br>Mail acompanante ".$i." ".$_POST["acompanante".$i];
        $sql = "
            SELECT *
            FROM usuario
            WHERE email = \"".$_POST["acompanante".$i]."\" 
        ";

        $result = mysqli_query($conn,$sql);
        if (mysqli_fetch_array($result) == 0){
            $isAcompanantesValidos = false;
        }
    }

    //echo var_export($isAcompanantesValidos, true);
/*
    $sql = "insert into reserva (id_viaje,vencimiento_reserva,id_estado_reserva,cod_cabina,cod_servicio,precio) 
            values ($idViaje,\"$fecha\",1, $idCabina, $idServicio,100)";
    //$result = mysqli_query($conn, $sql);
    $result =mysqli_query($conn,$sql)or die($sql);

    return $result;
$ultimo_id = mysqli_insert_id($result);

$query="insert into usario_hace_reserva(id_reserva,id_usuario)
            values($ultimo_id,$idUsuario);";
if(isset($_POST['agregar_acompañante']))
for($a=0;$a<5;$a++){
if(isset($_POST['acompañante'+$a+''])){
    $query="";
    }
}*/
?>