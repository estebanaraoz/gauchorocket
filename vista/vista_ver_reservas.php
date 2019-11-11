<?php include_once($_SERVER["DOCUMENT_ROOT"]."/public/header.php");?>
<br><br>
    <h2>Reservas</h2>
    <table class="table">
<?php
if (isset($reservas)){
echo "  <tr>
            <th>Codigo</th>
            <th>vencimiento</th>
            <th>estado</th>
            <th>cabina</th>
            <th>servicio</th>
            <th>precio</th>
        </tr>
        ";
foreach ($reservas as $reserva){
echo   "<tr>
            <td>" . $reserva['idreserva'] . "</td>
            <td>" . $reserva['vencimiento'] . "</td>
            <td>" . $reserva['estado'] . "</td>
            <td>". $reserva['cabina'] . "</td>
            <td>" . $reserva['servicio'] . "</td>
            <td>$" . $reserva['precio'] . "</td>
            <td><a href='controlador_pago.php?idreserva=". $reserva['idreserva'] . "'>pagar</a></td>
        </tr>";
}
} else {
    echo "No se han encontrado viajes.";
    //header("location: busqueda");
}
?>
    </table>
