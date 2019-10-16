<br>
<h2>Búsqueda de vuelos</h2>
<br><br>

<form method="post" action="modelo/modelo_busqueda.php">
  <div class="row">
    <div class="col">
      <label for="origen">Lugar</label>
      <br>
      <select class="custom-select" name="lugar" id="lugar">
        <?php
        include 'modelo_busqueda.php';
        $lugares = getLugares();
          foreach ($lugares as $lugar) {
              echo "<option value='$lugar[id]'>" .$lugar['nombre'] . "</option>";
            }
         ?>
      </select>
    </div>
    <div class="col">
      <label for="ida">Salida</label>
      <input type="date" class="form-control" name="ida" id="salida">
    </div>
      <div class="col">
        <label for="vuelta">Llegada</label>
        <input type="date" class="form-control" name="vuelta" id="llegada">
      </div>
      <div class="col">
        <label for="vuelta">Tipo de viaje</label>
        <input type="date" class="form-control" name="vuelta" id="tipo">
      </div>
      <div class="col-auto">
        <button type="submit" name="buscar" id="buscar" class="btn btn-primary boton-busqueda">Buscar</button>
      </div>

  </div>
</form>
<br><br>
