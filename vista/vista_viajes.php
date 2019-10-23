<!-- <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band"> -->
<br><br>
    <h2>Viajes</h2>
    <table class="table">
<?php
if (isset($viajes)){
echo "  <tr>
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
    //header("location: busqueda");
}
?>
    </table>
<!-- </div> -->
