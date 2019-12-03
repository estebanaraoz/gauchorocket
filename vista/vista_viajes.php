
<br><br>
    <h2>Viajes</h2>
    <table class="table">
<?php
if (isset($viajes)){
echo "  <tr>
            <th>SALIDA</th>
            <th>LLEGADA</th>
            <th>DURACION</th>
            <th>DESDE</th>
            <th>LUGAR ORIGEN</th>
            <th>LUGAR DESTINO</th>
        </tr>
        ";
foreach ($viajes as $viaje){
echo   "<tr>
            <td>" . $viaje['salidaViaje'] . "</td>
            <td>" . $viaje['llegadaViaje'] . "</td>
            <td>" . $viaje['duracion'] . "</td>
            <td>$" . $viaje['precio'] . "</td>
            <td>" . $viaje['lugarOrigen'] . "</td>
            <td>" . $viaje['lugarDestino'] . "</td>
            <td><a href='controlador_reserva.php?idViaje=". $viaje['idViaje'] . "'>Reserva</a></td>
        </tr>";
}
} else {
    echo "No se han encontrado viajes.";
    //header("location: busqueda");
}
?>
    </table>
<!-- </div> -->
