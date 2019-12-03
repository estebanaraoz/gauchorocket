<br><br>
<div class="alert alert-secondary" role="alert">
    <div class="col">
        <div class="row">Recuerda:</div>
        <div class="col">
            <div class="row">Los usuarios deben haber hecho la revision medica.</div>
            <div class="row">Asegurate de que el estado de salud de todos los pasajeros permitan reservar el vuelo.</div>
        </div>
    </div>
</div>
<h3>Trayectos</h3>
<form action="busqueda_trayectos_resultados" method="POST">
  <div class="row">
    <div class="col">
      <label for="origen">Selecciona Origen</label>
      <br>
      <select class="custom-select" name="origen">
          <option></option>
        <?php
        $lugares = getLugares();
          foreach ($lugares as $lugar) {
              echo "<option value=".$lugar["id"].">" .$lugar['nombre'] . "</option>";
            }
         ?>
      </select>
    </div>
      <div class="col">
          <label for="origen">Selecciona Destino</label>
          <br>
          <select class="custom-select" name="destino">
              <option></option>
              <?php
              $lugares = getLugares();
              foreach ($lugares as $lugar) {
                  echo "<option value=".$lugar["id"].">" .$lugar['nombre'] . "</option>";
              }
              ?>
          </select>
      </div>
    <div class="col">
    <label for="fecha">Fecha de viaje</label>
    <input type="date" class="form-control" name="fecha">
    </div>
    <div class="col-auto" style="margin-top: 28px;">
        <button type="submit" name="buscar" class="btn btn-primary boton-busqueda">Buscar</button>
    </div>
  </div>
</form>
