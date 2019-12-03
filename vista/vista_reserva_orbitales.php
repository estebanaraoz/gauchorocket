<br><br>
<h2>Reserva Viaje Orbital</h2>
<table class="w3-table">
    <tr>
        <th>SALIDA</th>
        <th>DURACION</th>
        <th>DESDE</th>
        <th>LUGAR ORIGEN</th>
        <th>CUPOS DISPONIBLES</th>
        <th>GENERAL</th>
        <th>FAMILIAR</th>
        <th>SUIT</th>
    </tr>
<?php

if (isset($viajes)){
echo "  
        <tr>
            <td>" . $viaje['salidaViaje'] . "</td>
            <td>" . $viaje['duracion'] . "</td>
            <td>$" . $viaje['precio'] . "</td>
            <td>" . $viaje['lugarOrigen'] . "</td>
            <td>" . $viaje['totalAsientos'] . "</td>
            <td>" . $viaje['totalGeneral'] . "</td>
            <td>" . $viaje['totalFamiliar'] . "</td>
            <td>" . $viaje['totalSuit'] . "</td>
        </tr>
        ";
}
else{
  echo "Error";
}
?>
</table>
<form class="" action="reserva_orbitales_confirmar" method="POST">
    <div class="row">
        <div class="col">
            </br>
            <h3><label for="servicio">Seleccione Tipo de Servicio</label></h3>
            <select class="custom-select" name="servicio">
            <?php
            $servicios=getTipoDeServicio();
            foreach ($servicios as $servicio) {
              echo "<option name='servicio' value=".$servicio["idServicio"].">" .$servicio['tipoServicio'] . "</option>";
            }
            ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            </br>
            <h3><label for="tipo">Seleccione Tipo de cabina</label></h3>
            <select class="custom-select" name="cabina">
            <?php
            $cabinas=getTipoDeCabinaParaViaje($_GET["idViaje"]);
            foreach ($cabinas as $cabina) {
              echo "<option name='cabina' value=".$cabina['idCabina'].">" .$cabina['tipoCabina'] . "</option>";
            }
            ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="hidden" name="idViaje" value="<?php echo $_GET['idViaje'];?>">
            <input type="hidden" name="fecha_vencimiento" value="<?php echo calcularFechaVencimiento($_GET['idViaje']);?>">
            <input type="hidden" id="cantAcompanantes" name="cantAcompanantes" value="">
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col">
            <div id="acompanante">

            </div>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col">
            <input type="button" type="submit" class="btn btn-primary" name="agregar_acompañante" onclick="agregarAcompanante()" value="Presione para agregar acompañantes">
            <input name="insertar" type="submit" class="btn btn-primary" value="Confirmar" >
        </div>
    </div>
</form>



<script>
    var a=0;
    var inputAcompanantes = document.getElementById("cantAcompanantes");
    inputAcompanantes.value = a;

    function agregarAcompanante(){
        a++;
        var inputAcompanantes = document.getElementById("cantAcompanantes");
        inputAcompanantes.value = a;

        var div = document.createElement('div');
        div.setAttribute('class', 'form-inline');
        div.innerHTML = '<div>' +
            '<label>Ingrese email de acompañante '+a+'</label>' +
            '<input class="form-control" name="acompanante'+a+'" type="email" placeholder="Ingrese email " />'+
            '</div>';
        document.getElementById('acompanante').appendChild(div);
    }
</script>


