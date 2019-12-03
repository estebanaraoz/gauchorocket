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
                                <form action='controlador_eliminar_vuelo.php?id_vuelo=<?php  echo $_GET['id_vuelo']; ?>' method="post">
                                    <input type="hidden" name="id_vuelo" value="<?php  echo $_GET['id_vuelo']; ?>">
                                    <select name="nave"class='custom-select' >
                                        <option value="">Opciones</option>
                                        <?php
                                        $naves=getNaves();
                                        foreach ($naves as $nave) {
                                            echo " <option name='nave' value='".$nave['id_nave']."'>".$nave['tipo_nave'] . "</option>";
                                        }   ?>
                                    </select>
                                    <input type="submit" name="eliminar" class="btn btn-primary" value="Eliminar">
                                </form></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


</body>
</html>