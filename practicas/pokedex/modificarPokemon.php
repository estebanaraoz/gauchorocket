<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Modificar Pokemon</title>
</head>
<body>
  <h1>Modificación</h1>
    <?php
      include("conexion.php");
      $pokemons = getPokemons();
    ?>
    <table>
      <thead>
        <th>Nombre</th>
        <th>Tipo</th>
      </thead>
    <?php  foreach ( $pokemons as $pokemon){
        echo   "<tr>
              <td>" . $pokemon['nombre'] . "</td>
              <td>" . $pokemon['tipo'] . "</td>
              <td><a href=' formModificar.php?nro=" . $pokemon['nro'] . " '>Modificar</a> </td>
            </tr>";
    }?>
    </table>
</body>
</html>
