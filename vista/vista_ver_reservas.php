<br><br>
<h2>Reservas</h2>
<table class="table">
<?php
    if (isset($reservas)){

        echo "  <tr>
                    <th>CODIGO RESERVA</th>
                    <th>VENCIMIENTO</th>
                    <th>ESTADO</th>
                    <th>CABINA</th>
                    <th>SERVICIO</th>
                    <th>PRECIO</th>
                    <th></th>
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
                    .identificarEstado($reserva['idestado'], $reserva["estado"],$reserva['idreserva']).
                "</tr>";

        }
    } else {
        echo "No se han encontrado reservas.";
        //header("location: busqueda");
    }
?>
</table>
