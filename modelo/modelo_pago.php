<?php
    include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php"); 

 $conn = getConexion();
 $idreserva = $_GET['idreserva'];
 $valida = false;
if(isset($_POST['confirm'])){

$submitbutton= $_POST['confirm'];

$number= $_POST['numerotarjeta'];

function validatecard($number)
 {
    global $type;

    $cardtype = array(
        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/",
        "amex"       => "/^3[47][0-9]{13}$/",
        "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
    );

    if (preg_match($cardtype['visa'],$number))
    {
	$type= "visa";
        return 'visa';
	
    }
    else if (preg_match($cardtype['mastercard'],$number))
    {
	$type= "mastercard";
        return 'mastercard';
    }
    else if (preg_match($cardtype['amex'],$number))
    {
	$type= "amex";
        return 'amex';
	
    }
    else if (preg_match($cardtype['discover'],$number))
    {
	$type= "discover";
        return 'discover';
    }
    else
    {
        return false;
    } 
 }

validatecard($number);


if ($submitbutton)
{
if (validatecard($number) !== false)
{
 $sql = "UPDATE `reserva` SET `id_estado_reserva` = '3' WHERE `reserva`.`id_reserva` = $idreserva;";
     mysqli_query($conn, $sql) or die("Error al buscar usuario.");
    header("Location:/controlador/controlador_ver_reservas.php?idreserva=". $idreserva ."" );
    exit();
	
}
else
{
echo " <red>La tarjeta no es valida</red>";
}
}
}


?>