<?php
include("helpers/conexion.php");
$conn = getConexion();

if (isset($_SESSION["id_usuario"])) {

    $sql = "
        SELECT tv.nombre_tipo_viaje as tipo_viaje, th.nombre_hospital as nombre_hospital 
        FROM pasajero as pas 
        INNER JOIN estado_fisico as ef on ef.id_estado_fisico = pas.id_estado_fisico
        INNER JOIN tipo_viaje as tv on tv.id_tipo_viaje = ef.id_tipo_viaje
        INNER JOIN turno_hospital as th on th.id_hospital = pas.id_hospital
        WHERE pas.id_usuario = ".$_SESSION["id_usuario"].";
    ";

    $result= mysqli_query($conn,$sql) or die("Error al consultar tabla pasajero.");

    if (mysqli_num_rows($result) > 0) {
        echo "Ya has sido checkeado.";
        echo "</br></br>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "Has sido clasificado para realizar vuelos de tipo: ".$row["tipo_viaje"];
            echo "</br>";
            echo "En el hospital: ".$row["nombre_hospital"];
        }
    } else {
        include("modelo/modelo_hospital_mostrar.php");
        include("vista/vista_hospital_seleccionado.php");
    }
} else {
    echo "Debes estar logeado para seleccionar hospital. Esta pagina se actualizara.
            <script>
            <!--
            function timedRefresh(timeoutPeriod) {
                setTimeout(\"window.location.replace('/login');\",timeoutPeriod);
            }
            
            window.onload = timedRefresh(5000);
            
            //   -->
            </script>
        ";
}
?>