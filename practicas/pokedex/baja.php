<?php
    $nro = $_GET['nro'];

    $conexion = mysqli_connect('localhost','root',"",'pokedex')
    or die(mysqli_errno);

    $query = "delete from pokemon where nro = \"$nro\";";
    $resultado = mysqli_query($conexion,$query);
        header("Location:pokedex.php");
        exit();

?>
