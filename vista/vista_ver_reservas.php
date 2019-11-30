
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
            <td>$" . $reserva['precio'] . "</td>"
			.identificarEstado($reserva['idestado'],$reserva['idreserva']).
		"</tr>";
	
}
} else {
    echo "No se han encontrado reservas.";
    //header("location: busqueda");
}
?>
    </table>
