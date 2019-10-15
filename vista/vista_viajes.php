<!-- The Band Section -->
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">Viajes</h2>
    <table class="w3-table">
<?php
if ($viajes){
echo "  <tr>
            <th>ID</th>
            <th>SALIDA</th>
            <th>LLEGADA</th>
            <th>DURACION</th>
            <th>PRECIO</th>
            <th>TIPO</th>
            <th>LUGAR</th>
        </tr>
        ";
foreach ($viajes as $viaje){
echo   "<tr>
            <td>" . $viaje['idViaje'] . "</td>
            <td>" . $viaje['salidaViaje'] . "</td>
            <td>" . $viaje['llegadaViaje'] . "</td>
            <td>" . $viaje['duracion'] . "</td>
            <td>" . $viaje['precio'] . "</td>
            <td>" . $viaje['idTipoViaje'] . "</td>
            <td>" . $viaje['idLugar'] . "</td>
        </tr>";
}
} else {
    echo "No se han encontrado viajes.";
}
?>
    </table>
</div>
