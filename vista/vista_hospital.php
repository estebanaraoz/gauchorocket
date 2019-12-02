<br><br>
<h2 class="w3-wide">Hospitales</h2>
<table class="w3-table">
    <tr>
        <th>Hospital</th>
        <th>Turnos</th>
        <th>Fecha</th>
    </tr>
    <?php

    $hospitales=getHospital();
    foreach($hospitales as $hospital){
    echo" <tr>
                <td>". $hospital['nombre']."</td>
                <td>". $hospital['turnos']."</td>
                <td>". $hospital['fecha']."</td>
                <td><a href=\"hospital_seleccionado?idTurno=".$hospital['id_turno']."&fecha=".$hospital['fecha']."\">Mostrar</a></td>
        </tr>";
    }
    ?>
</table>



