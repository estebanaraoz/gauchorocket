<br>
<h2>Búsqueda de vuelos</h2>
<br><br>

<form method="post" action="controlador/controlador_resultado_busqueda.php">
  <div class="row">
    <div class="col">
      <label for="origen">Origen</label>
      <br>
      <select class="custom-select" name="origen">
        <option value="">Seleccionar lugar</option>
        <?php
        $lugares = getLugares();
          foreach ($lugares as $lugar) {
              echo "<option value='$lugar[nombre]'>" .$lugar['nombre'] . "</option>";
            }
         ?>
      </select>
    </div>
    <div class="col">
      <label for="destino">Destino</label>
      <select class="custom-select" name="destino">
        <option value="">Seleccionar lugar</option>
        <?php
        $lugares = getLugares();
          foreach ($lugares as $lugar) {
              echo "<option value='$lugar[nombre]'>" .$lugar['nombre'] . "</option>";
            }
         ?>
      </select>
    </div>
      <div class="col">
        <label for="fecha">Fecha de viaje</label>
        <input type="date" class="form-control" name="fecha">
      </div>
      <!-- <div class="col">
        <label for="vuelta">Tipo de viaje</label>
        <input type="text" class="form-control" name="vuelta" id="tipo">
      </div> -->
      <div class="col-auto">
        <button type="submit" name="buscar" id="buscar" class="btn btn-primary boton-busqueda">Buscar</button>
      </div>

  </div>
</form>
<br><br>
