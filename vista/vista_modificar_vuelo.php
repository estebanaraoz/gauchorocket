<p><h1>Bienvenido administrador</h1><p>


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
                            <td><a href='controlador_modificar_vuelo.php?id_vuelo=".$viaje['id_viaje']."'>Modificar Vuelo</a></td>
                            <td><a href='controlador_eliminar_vuelo.php?id_vuelo=".$viaje['id_viaje']."'>Eliminar Vuelo</a></td>
                            <td><a href='controlador_asociar_nave.php?id_vuelo=".$viaje['id_viaje']."'>Asociar a Nave</a></td>


                        </tr>                                  
                   ";

                            }

                            ?>

                        </table>
                    </div>
                </div>
            </div>

        </div>

            <form action='controlador_modificar_vuelo.php?id_vuelo=<?php  echo $_GET['id_vuelo']; ?>' method="post">
                <input type="hidden" name="id_vuelo" value="<?php  echo $_GET['id_vuelo']; ?>">
                <select name="nave"class='custom-select' >
                    <option value="">Naves</option>
                    <?php
                    $naves=getNaves();
                    foreach ($naves as $nave) {
                        echo " <option name='nave' value='".$nave['id_nave']."'>".$nave['tipo_nave'] . "</option>";
                    }   ?>
                </select>
                <div class="row">
                    <div class="col">
                        <label >Fecha salida</label>
                        <input type="date" class="form-control"  name="fecha_salida" >
                    </div>
                    <div class="col">
                        <label >Fecha llegada</label>
                        <input type="date" class="form-control"  name="fecha_llegada" >
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label >Duracion</label>
                        <input type="time" class="form-control"  name="duracion" >
                    </div>
                    <div class="col">
                        <label >precio</label>
                        <input type="number" class="form-control"  name="precio" >
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label >Tipo de Vuelo</label>
                        <select class="custom-select" name="tipo_vuelo">
                            <option value="">Tipo de Viaje</option>
                            <?php
                            $tipo_viaje=getTipoViajes();
                            foreach ($tipo_viaje as $tipo_vuelo) {
                                echo "<option name='tipo_vuelo' value='$tipo_vuelo[id]'>" .$tipo_vuelo['tipo'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Origen</label>
                        <select class="custom-select" name="origen" >
                            <option value="">origen</option>
                            <?php
                            $localidades=getLocalidades();
                            foreach ($localidades as $localidad) {
                                echo "<option name='origen' value='$localidad[id_lugar]'>" .$localidad['nombre_lugar'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label >Destino</label>
                        <select class="custom-select" name="destino">
                            <option value="" >destino</option>
                            <?php
                            $localidades=getLocalidades();
                            foreach ($localidades as $localidad) {
                                echo "<option name='destino' value='$localidad[id_lugar]'>" .$localidad['nombre_lugar'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <input type="submit" name="actualizar" class="btn btn-primary" value="Actualizar">
            </form>



</div>
</div>


</body>
</html>