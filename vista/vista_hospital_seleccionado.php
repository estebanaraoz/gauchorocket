<br><br>
<h2 class="w3-wide">Hospitales</h2>
<table class="w3-table">
    <tr>
        <th>Hospital</th>
        <th>Turnos</th>
        <th>Fecha</th>
    </tr>

    <?php

    $hospitals=mostrarHospital($_GET['idTurno'], $_GET['fecha']);
    foreach($hospitals as $hospital){
    echo" <tr>

                <td>". $hospital['nombre']."</td>
                <td>". $hospital['turnos']."</td>
                <td>". $hospital['fecha']."</td>
                <td><a href=\"hospital_sacar_turno?idTurno=".$hospital['id_turno']."\">Sacar turno</a></td>
        </tr>";
    }
    ?>
</table>

