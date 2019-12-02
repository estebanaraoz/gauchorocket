<?php
include("helpers/conexion.php");

//Realiza conexion con la base de datos.
$conn = getConexion();

if(isset($_POST['registrarse'])){
    $user = $_POST['user'];
    $password = md5($_POST['pass']);
    $email = $_POST['email'];

    //Realiza consulta de todos los viajes pesistidos en la base de datos.
    $sqlVerificacionUsuario = "SELECT * FROM usuario WHERE nombre = '$user'";
    $resultUser = mysqli_query($conn, $sqlVerificacionUsuario) or die("Error al realizar la consulta del usuario.");

    $sqlVerificacionMail = "SELECT * FROM usuario WHERE email = '$email'";
    $resultMail = mysqli_query($conn, $sqlVerificacionMail) or die("Error al realizar la consulta del email.");

    if(mysqli_num_rows($resultUser) ==0){
        if(mysqli_num_rows($resultMail) ==0){
            $query = "insert into usuario(nombre,contrasena,email,id_tipo_usuario) values (\"$user\",\"$password\",\"$email\",2);"
            or die(mysqli_errno);
            $resultado = mysqli_query($conn,$query);
            if($resultado){
                echo "Usuario registrado exitosamente. Esta pagina se actualizara.
                <script>
                <!--
                function timedRefresh(timeoutPeriod) {
                    setTimeout(\"window.location.replace('/');\",timeoutPeriod);
                }
                
                window.onload = timedRefresh(5000);
                
                //   -->
                </script>
                ";
            } else {
                echo "Hubo un error al registrar su usuario.<br>
                <button class=\"btn btn-primary\" onclick=\"goBack()\">Regresar</button>
                
                <script>
                function goBack() {
                  window.history.back();
                }
                </script>
            ";
            }
        }
        else{
            echo "El mail ya fue utilizado<br>
                <button class=\"btn btn-primary\" onclick=\"goBack()\">Regresar</button>
                
                <script>
                function goBack() {
                  window.history.back();
                }
                </script>
            ";
        }
    }
    else {
        echo "El usuario ya fue utilizado<br>
                <button class=\"btn btn-primary\" onclick=\"goBack()\">Regresar</button>
                
                <script>
                function goBack() {
                  window.history.back();
                }
                </script>
        ";
    }
}
?>