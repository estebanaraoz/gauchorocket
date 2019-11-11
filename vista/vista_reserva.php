
<?php

// $viajes = traerViajeParaReserva();


if (isset($viajes)){
echo "  <ul>
            <li>SALIDA: " . $viaje['salidaViaje'] . "</li>
            <li>LLEGADA: " . $viaje['llegadaViaje'] . "</li>
            <li>DURACION: " . $viaje['duracion'] . "</li>
            <li>DESDE: $" . $viaje['precio'] . "</li>
            <li>LUGAR ORIGEN: " . $viaje['lugarOrigen'] . "</li>
            <li>LUGAR DESTINO: " . $viaje['lugarDestino'] . "</li>
        </ul>
        ";
}
else{
  echo "error";
}
?>
<form class="" action="controlador/controlador_reserva.php" method="post"> 
  <div class="row">
    <div class="col">
      <label for="servicio">Seleccione tipo de servicio</label>
        <br>
         <select class="custom-select" name="servicio">
            <option value="">Tipo de Servicio</option>
            <?php
            $servicios=getTipoDeServicio();
            foreach ($servicios as $servicio) {
              echo "<option value='$servicio[tipo]'>" .$servicio['tipo'] . "</option>";
            }
            ?>
        </select>
      </div>
    </div>
    <div class="row">
    <div class="col">
      <label for="tipo">Seleccione Cabina</label>
        <br>
         <select class="custom-select" name="tipo_servicio">
            <option value="">Tipo de cabina</option>
            <?php
            $cabinas=getTipoDeCabina();
            foreach ($cabinas as $cabina) {
              echo "<option value='$cabina[tipo_cabina]'>" .$cabina['tipo_cabina'] . "</option>";
            }
            ?>
        </select>
      </div>
    </div>
</form>
<form class="" action="TestDeGenerarForms.php" method="post">
  <label>ingrese cantidad de acompañantes</label>
  <input type="number" name="cantidad_de_acompañantes">
</form>
