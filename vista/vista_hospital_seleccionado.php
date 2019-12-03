<br><br>
<h2 class="w3-wide">Hospitales</h2>
<table class="w3-table">
    <tr>
        <th>Hospital</th>
        <th>Turnos</th>
        <th>Fecha</th>
    </tr>

    <?php

    $hospitals=mostrarHospital($_GET['idHospital']);
    foreach($hospitals as $hospital){
    echo" <tr>

                <td>". $hospital['nombre']."</td>
                <td>". $hospital['turnos']."</td>
                <td><input class=\"form-control\" type='date' name='fecha_turno' step='1'  value='".date("Y-m-d")."'></td>
                <td><a href='hospital_sacar_turno?idHospital=".$hospital['id_hospital'] ."'>Sacar turno</a></td>
        </tr>";
    }
    ?>
</table>

