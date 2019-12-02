<?php
if (isset($_SESSION["id_usuario"])){
    echo "Ya has iniciado sesion.";
} else {
    include("vista/vista_login.php");
}
?>
