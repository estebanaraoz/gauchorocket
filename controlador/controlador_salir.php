<?php
if (isset($_SESSION["id_usuario"])){
    unset($_SESSION["id_usuario"]);
    session_destroy();
    echo "Has cerrado sesion. Esta pagina se actualizara.
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
    echo "Debes estar logeado para cerrar sesion.
            <script>
            <!--
            function timedRefresh(timeoutPeriod) {
                setTimeout(\"window.location.replace('/');\",timeoutPeriod);
            }
            
            window.onload = timedRefresh(5000);
            
            //   -->
            </script>
        ";
}
?>
