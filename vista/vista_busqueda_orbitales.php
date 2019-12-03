<br><br>
<h3>Viajes Orbitales</h3>
<form action="busqueda_orbitales_resultados" method="POST">
  <div class="row">
    <div class="col">
      <label for="origen">Selecciona Origen</label>
      <br>
      <select class="custom-select" name="origen">
          <option></option>
        <?php
        $lugares = getLugaresOrbitales();
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
