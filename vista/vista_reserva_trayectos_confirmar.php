<br><br>
<h2>Reserva Trayecto</h2>
<?php
    if (sizeof($mensajesError) == 0){
        $reserva = getReservaPorId($idReserva);
        foreach ($comentarios as $comentario) {
            echo "
            <div class=\"alert alert-warning\" role=\"alert\">
                $comentario
            </div>
            ";
        }
        echo "
        <div class=\"card border-success mb-3\">
            <div class=\"card-header\">Reserva realizada con exito.</div>
            <div class=\"card-body text-success\">
                <table class=\"nav justify-content-center\">
        ";
        foreach ($reserva as $row) {
            echo " <tr><td class='text-right'>ID RESERVA: </td><td> ".$row["id_reserva"]."</td></tr>";
            echo " <tr><td class='text-right'>ID VIAJE: </td><td> ".$row["id_viaje"]."</td></tr>";
            echo " <tr><td class='text-right'>NOMBRE NAVE: </td><td> ".$row["nombre_nave"]."</td></tr>";
            echo " <tr><td class='text-right'>MATRICULA NAVE: </td><td> ".$row["matricula_nave"]."</td></tr>";
            echo " <tr><td class='text-right'>ESTADO DE RESERVA: </td><td> ".$row["estado"]."</td></tr>";
            echo " <tr><td class='text-right'>CABINA: </td><td> ".$row["tipo_cabina"]."</td></tr>";
            echo " <tr><td class='text-right'>SERVICIO: </td><td> ".$row["tipo_servicio"]."</td></tr>";
            echo " <tr><td class='text-right'>VENCIMIENTO: </td><td> ".$row["vencimiento_reserva"]."</td></tr>";
            echo " <tr><td class='text-right'>CANTIDAD PASAJEROS: </td><td> ".$row["pasajeros"]."</td></tr>";
            echo " <tr><td class='text-right'>VALOR TOTAL: </td><td> ".$row["valor"]."</td></tr>";
        }
        echo "
                </table>
            </div>
        </div>
        ";
    } else {
        foreach ($mensajesError as $mensaje) {
            echo "
            <div class=\"alert alert-danger\" role=\"alert\">
                $mensaje
            </div>
            ";
        }
        echo "</br>
                <button class=\"btn btn-primary\" onclick=\"goBack()\">Regresar</button>
                
                <script>
                function goBack() {
                  window.history.back();
                }
                </script>        
        ";
    }
?>

