<h2 class="">Registrar Viaje</h2>
<form action="modelo/modelo_crear_reserva.php" method="post">
    <div class="form-group">
        <label for="email">codigo de vuelo</label>
        <input type="number" class="form-control" id="email" name="cod_vuelo" required>
    </div>
    <div class="row">
        <div class="col">
            <label >Fecha salida</label>
            <input type="date" class="form-control"  name="fecha_salida" required>
        </div>
        <div class="col">
            <label >Fecha llegada</label>
            <input type="date" class="form-control"  name="fecha_llegada" required>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label >Duracion</label>
            <input type="time" class="form-control"  name="duracion" required>
        </div>
        <div class="col">
            <label >precio</label>
            <input type="number" class="form-control"  name="precio" required>
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
            <select class="custom-select" name="tipo_vuelo">
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
            <select class="custom-select" name="tipo_vuelo">
                <option value="">destino</option>
                <?php
                $localidades=getLocalidades();
                foreach ($localidades as $localidad) {
                    echo "<option name='destino' value='$localidad[id_lugar]'>" .$localidad['nombre_lugar'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <input id="crear" name="crear" type="submit" class="btn btn-primary" value="Registrar Vuelo">
</form>