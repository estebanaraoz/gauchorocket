
<p><h1>Bienvenido administrador</h1><p>
<form class="form-inline my-2 my-lg-0" action="buscar_vuelo.php" method="POST">
    <input class="form-control mr-sm-2" type="search" name="nombre_buscar" placeholder="Buscar por nombre" aria-label="Search">
    <button class="btn btn-primary" type="submit">Buscar</button>
</form>

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

                $viajes=getDatos();
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
                            <td><a href=''>Modificar Vuelo</a></td>
                            <td><a href=''>Eliminar Vuelo</a></td>
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
        <div class="row">
            <a href="../controlador/controlador_crear_vuelo.php">Insertar Nuevo Vuelo</a>
        </div>
    </div>



</div>


</body>
</html>