<?php
if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $nro = $_POST['numero'];

    $conexion = mysqli_connect('localhost','root',"",'pokedex')
	  or die(mysqli_errno);

    $query = "insert into pokemon(nro,nombre,tipo)values(\"$nro\",\"$nombre\",\"$tipo\");";
    $resultado = mysqli_query($conexion,$query);
        header("Location:pokedex.php");
        exit();
}

?>
