<br><br>
<h2 class="w3-wide">Hospitales</h2>
<table class="w3-table">
    <tr>
        <th>Hospital</th>
        <th>Turnos</th>
    </tr>
    <?php

    $hospitales=getHospital();
    foreach($hospitales as $hospital){
    echo" <tr>
                <td>". $hospital['nombre']."</td>
                <td>". $hospital['turnos']."</td>
                <td><a href='hospital_seleccionado?idHospital=". $hospital['id_hospital']."'>Mostrar</a></td>
        </tr>";
    }
    ?>
</table>



