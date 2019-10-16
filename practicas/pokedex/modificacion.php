<?php
if(isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $nro = $_POST['numero'];

    $conexion = mysqli_connect('localhost','root',"",'pokedex')
    or die(mysqli_errno);

    $query = "update pokemon set nombre = \"$nombre\", tipo = \"$tipo\" where nro = \"$nro\";";
    $resultado = mysqli_query($conexion,$query);
        header("Location:pokedex.php");
        exit();
}

?>
