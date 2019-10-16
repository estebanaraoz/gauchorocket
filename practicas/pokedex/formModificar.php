<?php
// echo $_GET["nro"];
include("conexion.php");
$nombre = "";
$tipo = "";
$pokemons = getPokemons();
$tipos = getTipos();

foreach ( $pokemons as $pokemon){
  if ($pokemon['nro'] == $_GET["nro"]) {
    $nombre = $pokemon['nombre'];
    $tipo = $pokemon['tipo'];
  }
}
?>

<form action="modificacion.php" method="post">
  <label>Numero de Pokemon</label>
  <input name="numero" type="text" value='<?php echo $_GET["nro"]; ?>' readonly='readonly'>
  <br><br>
  <label>Nombre de Pokemon</label>
  <input name="nombre" class="form-input" type="text" value="<?php echo $nombre; ?>">
  <br><br>
  <label>Tipo de Pokemon </label>
  <select class="" name="tipo">
    <?php
      foreach ($tipos as $tipo) {
        if ($tipo['id'] == $_GET["nro"]) {
          echo "<option value='$tipo[id]' selected>" .$tipo['nombre'] . "</option>";
        }
        else{
          echo "<option value='$tipo[id]'>" .$tipo['nombre'] . "</option>";
        }
      }
     ?>
  </select>
  <!-- <input name="tipo" type="text" value="<?php echo $tipo; ?>"> -->
  <br><br>
  <input id="enviar" name="enviar" type="submit" value="Aceptar">
</form>
