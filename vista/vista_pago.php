<?php 
include_once($_SERVER["DOCUMENT_ROOT"]."/public/header.php");
$idreserva = $_GET['idreserva'];



echo'
<br>
 <h2></h2>
    <form action="../controlador/controlador_pago.php?idreserva='. $idreserva . ' " method="POST">
        <div class="form-group">
            <label for="numerotarjeta">Numero de tarjeta</label>
            <input type="text" class="form-control" id="numerotarjeta"  name="numerotarjeta" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="codigoTarjeta">codigo Tarjeta</label>
            <input type="password" class="form-control" id="codigoTarjeta" name="codigoTarjeta" placeholder="" required>
        </div>
        <br>
        <input id="confirm" name="confirm" type="submit" class="btn btn-primary" value="Confirmar">
    </form>

<br>'

?>
