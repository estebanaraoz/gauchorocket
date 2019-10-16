<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Eliminar Pokemon</title>
</head>
<body>
  <h1>Eliminar Pokemon</h1>
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
              <td><a href=' baja.php?nro=" . $pokemon['nro'] . " '>Eliminar</a> </td>
            </tr>";
    }?>
    </table>
</body>
</html>
