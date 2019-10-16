<?php
include("conexion.php");
$tipos = getTipos();
 ?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Insertar Pokemon</title>
</head>
<body>
  <form action="ingresarPokemon.php" method="post">
    <label>Numero de Pokemon</label>
    <input name="numero" class="form-input" type="text" >
    <br><br>
    <label>Nombre de Pokemon</label>
    <input name="nombre" class="form-input" type="text"  required>
    <br><br>
    <label>Tipo de Pokemon </label>
    <select class="" name="tipo">
      <?php
        foreach ($tipos as $tipo) {
            echo "<option value='$tipo[id]'>" .$tipo['nombre'] . "</option>";
        }
      ?>
    </select>
    <!-- <input name="tipo" type="text" > -->
    <br><br>
    <input id="enviar" name="enviar" type="submit" value="Aceptar">
  </form>
</body>
</html>
