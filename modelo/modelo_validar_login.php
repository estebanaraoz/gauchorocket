<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");

//Realiza conexion con la base de datos.
$conn = getConexion();

if(isset($_POST['login'])){
    $user = $_POST['user'];
    $password = md5($_POST['pass']);

    //Realiza consulta de todos los viajes pesistidos en la base de datos.
    $sql = "SELECT * FROM cliente WHERE usuario = '$user' AND password = '$password'";
    $result = mysqli_query($conn, $sql) or die("Error al realizar la consulta de login.");

    //Mensajes de respuesta.
    if (mysqli_num_rows($result) > 0) {
        // header("Location:index.php");
        echo "Estás logueado";
        exit();
    } else{
        echo "Usuario o contraseña inválidos";
    }
}
?>