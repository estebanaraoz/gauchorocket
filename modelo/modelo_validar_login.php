<?php
include("helpers/conexion.php");

//Realiza conexion con la base de datos.
$conn = getConexion();

if(isset($_POST['login'])){
    $user = $_POST['user'];
    $password = md5($_POST['pass']);

    //Realiza consulta de todos los viajes pesistidos en la base de datos.
    $sql = "SELECT * FROM usuario WHERE nombre = '$user' AND contrasena = '$password'";
    $result = mysqli_query($conn, $sql) or die("Error al realizar la consulta de login.");

    //Mensajes de respuesta.
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION["id_usuario"] = $row["id_usuario"];
        }

        echo "Te has logueado. Esta pagina se actualizara.
            <script>
            <!--
            function timedRefresh(timeoutPeriod) {
                setTimeout(\"location.reload(true);\",timeoutPeriod);
            }
            
            window.onload = timedRefresh(5000);
            
            //   -->
            </script>
        ";
    } else{
        echo "Usuario o contraseña inválidos<br>
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