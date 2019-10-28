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

<form class="" action="index.html" method="post">
  <select class="" name="">
    <option value=""></option>
  </select>
</form>
