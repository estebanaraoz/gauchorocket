<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="./assets/img/favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Pokedex</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<!-- Fonts and icons -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<!-- CSS Files -->
<link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="./assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="./assets/css/demo.css" rel="stylesheet" />
</head>
<body>
<h1>Pokedex</h1>
<div class="content">
  <div class="container-fluid">
    <div class="section">
		    <div class="card-body -wtable-fullidth table-responsive">
          <table class="table table-hover table-striped">
            <thead>
              <th>Numero</th>
              <th>Nombre</th>
              <th>Tipo</th>
            </thead>

            <?php
            include("conexion.php");
            $pokemons = getPokemons();
            foreach ( $pokemons as $pokemon){
            		echo   "<tr>
            					<td>" . $pokemon['nro'] . "</td>
            					<td>" . $pokemon['nombre'] . "</td>
            					<td>" . $pokemon['tipo'] . "</td>
            				</tr>";
            }
            ?>
          </table>
        </div>
    </div>
  </div>
</div>
<br><br>
<a href="formIngresar.php">Insertar Pokemon</a>
<br>
<a href="modificarPokemon.php">Modificar Pokemon</a>
<br>
<a href="eliminarPokemon.php">Eliminar Pokemon</a>


</body>
</html>
