<?php
if (isset($_SESSION["id_usuario"])){
    echo "Ya has iniciado sesion. Esta pagina se actualizara.
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
include("modelo/modelo_validar_login.php");
}
?>
