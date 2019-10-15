<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");

//Realiza conexion con la base de datos.
$conn = getConexion();

if(isset($_POST['registrarse'])){
    $user = $_POST['user'];
    $password = md5($_POST['pass']);
    $email = $_POST['email'];

    //Realiza consulta de todos los viajes pesistidos en la base de datos.
    $sqlVerificacionUsuario = "SELECT * FROM cliente WHERE usuario = '$user'";
    $resultUser = mysqli_query($conn, $sqlVerificacionUsuario) or die("Error al realizar la consulta del usuario.");

    $sqlVerificacionMail = "SELECT * FROM cliente WHERE email = '$email'";
    $resultMail = mysqli_query($conn, $sqlVerificacionMail) or die("Error al realizar la consulta del email.");

    if(mysqli_num_rows($resultUser) ==0){
        if(mysqli_num_rows($resultMail) ==0){
            $query = "insert into cliente(usuario,password,email, tipo_cliente)values(\"$user\",\"$password\",\"$email\",2);"
            or die(mysqli_errno);
            $resultado = mysqli_query($conn,$query);
            header("Location:index.php");
            exit();
        }
        else{
            echo "El mail ya fue utilizado";
            exit();
        }
    }
    else {
        echo "El usuario ya fue utilizado";
        exit();
    }
}
?>