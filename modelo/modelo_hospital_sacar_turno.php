<?php

$id_usuario=$_SESSION['id_usuario'];

$nivel=rand(1,3);

$id_hospital=$_GET['idHospital'];

$sql ="insert into pasajero(id_usuario,id_estado_fisico,id_hospital)values('$id_usuario','$nivel','$id_hospital');";

$resultado= mysqli_query($conn,$sql);

if($resultado){
    echo "Has sacado turno exitosamente. Esta pagina se actualizara.
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
    echo "Hubo un error al sacar turno.<br>
                <button class=\"btn btn-primary\" onclick=\"goBack()\">Regresar</button>
                
                <script>
                function goBack() {
                  window.history.back();
                }
                </script>
            ";
}
?>