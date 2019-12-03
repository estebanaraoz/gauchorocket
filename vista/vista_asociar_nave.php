
<p><h1>Asocie una nave al Vuelo</h1><p>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="section">
                    <div class="card-body -wtable-fullidth table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>Cod Viaje</th>
                            <th>Fecha salida</th>
                            <th>Fecha llegada</th>
                            <th>Duracion</th>
                            <th>Precio</th>
                            <th>Tipo Viaje</th>
                            <th>Lugar destino</th>
                            <th>Lugar origen</th>
                            </thead>
                            <?php

                            $viajes=getDatoDeNave($_GET['id_vuelo']);
                            foreach ($viajes as $viaje){
                                echo"<tr>
                            <td>".$viaje['id_viaje']."</td>
                            <td>".$viaje['salida']."</td>
                            <td>".$viaje['llegada']."</td>
                            <td>".$viaje['duracion']."</td>
                            <td>$".$viaje['precio']."</td>
                            <td>".$viaje['tipo_viaje']."</td>
                            <td>".$viaje['lugar_destino']."</td>
                            <td>".$viaje['lugar_origen']."</td>

                                                          
                   ";} ?>
                            <td>
                                <select class='custom-select' name='nave'>
                                    <option value="">Opciones</option>
                            <?php
            $naves=getNaves();
            foreach ($naves as $nave) {
              echo " <option name='".$nave['id_nave']."' value='".$nave['id_nave']."'>".$nave['tipo_nave'] . "</option>";
            }   ?>
                                    </select>
                            </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <?php
echo "<a href='asociar.php?id_vuelo=".$_GET['id_vuelo']."&nave_id=".$nave['id_nave']."'>Asociar</a>";

?>
</div>


</body>
</html>