<?php
function getPokemons(){

	$conexion = mysqli_connect('localhost','root',"",'pokedex');
	$query = "select p.nro,p.nombre,t.nombre as tipo
						from pokemon p
						inner join tipo t
						on p.tipo = t.id; ";
	$resultado = mysqli_query($conexion,$query);
  $pokemons = Array();

    if (mysqli_num_rows($resultado) > 0) {

        while($row = mysqli_fetch_assoc($resultado)) {

            $pokemon['nro'] =  $row["nro"];
            $pokemon['nombre'] =  $row["nombre"];
            $pokemon['tipo'] =  $row["tipo"];
            $pokemons[] = $pokemon;
        }
    }
    return $pokemons;
}

function getTipos(){
	$conexion = mysqli_connect('localhost','root',"",'pokedex');
	$query = "select * from tipo; ";
	$resultado = mysqli_query($conexion,$query);
	$tipos = Array();

	if (mysqli_num_rows($resultado) > 0) {

			while($row = mysqli_fetch_assoc($resultado)) {

					$tipo['id'] =  $row["id"];
					$tipo['nombre'] =  $row["nombre"];
					$tipos[] = $tipo;
			}
	}
	return $tipos;
}
?>
