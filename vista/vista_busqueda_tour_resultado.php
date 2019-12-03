<br><br>
    <div class="alert alert-secondary" role="alert">
        <div class="col">
            <div class="row">Recuerda:</div>
            <div class="col">
                <div class="row">Los usuarios deben haber hecho la revision medica.</div>
                <div class="row">Asegurate de que el estado de salud de todos los pasajeros permitan reservar el vuelo.</div>
            </div>
        </div>
    </div>
    <h3>Tour</h3>
    <table class="table">
<?php
if (isset($viajes)){
echo "  <tr>
            <th>TIPO DE VIAJE</th>
            <th>SALIDA</th>
            <th>DURACION</th>
            <th>DESDE</th>
            <th>LUGAR ORIGEN</th>
            <th>CUPOS DISPONIBLES</th>
            <th>GENERAL</th>
            <th>FAMILIAR</th>
            <th>SUIT</th>
        </tr>
        ";
foreach ($viajes as $viaje){
echo   "<tr>
            <td>" . $viaje['tipoViaje'] . "</td>
            <td>" . $viaje['salidaViaje'] . "</td>
            <td>" . $viaje['duracion'] . "</td>
            <td>$" . $viaje['precio'] . "</td>
            <td>" . $viaje['lugarOrigen'] . "</td>
            <td>" . $viaje['totalAsientos'] . "</td>
            <td>" . $viaje['totalGeneral'] . "</td>
            <td>" . $viaje['totalFamiliar'] . "</td>
            <td>" . $viaje['totalSuit'] . "</td>
       ";
if (isset($_SESSION["id_usuario"])){
echo   "    <td><a href='reserva_tour?idViaje=".$viaje['idViaje']."'>Reserva</a></td>";
}
echo "</tr>";

}
} else {
    echo "No se han encontrado viajes.";
    //header("location: busqueda");
}
?>
    </table>
