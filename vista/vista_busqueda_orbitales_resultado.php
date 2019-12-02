<br><br>
    <h3>Viajes Orbitales</h3>
    <table class="table">
<?php
if (isset($viajes)){
echo "  <tr>
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
echo   "    <td><a href='reserva_orbitales?idViaje=".$viaje['idViaje']."'>Reserva</a></td>";
}
echo "</tr>";

}
} else {
    echo "No se han encontrado viajes.";
    //header("location: busqueda");
}
?>
    </table>
