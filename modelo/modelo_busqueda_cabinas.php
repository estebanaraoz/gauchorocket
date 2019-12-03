<?php
    function getTipoDeCabinaParaViaje($idViaje){
        $conn=getConexion();
        $idViaje = $idViaje;
        $consulta="
            SELECT  cab.id_cabina as id_cabina, cab.tipo_cabina as tipo_cabina
            FROM viaje via
            INNER JOIN viaje_nave_cabina vnc ON via.id_viaje = vnc.id_viaje
            INNER JOIN cabina cab ON vnc.id_cabina = cab.id_cabina 
            WHERE via.id_viaje = $idViaje
        ";

        $resultadoCab = mysqli_query($conn,$consulta)
        or die("Error al realizar la consulta de búsqueda");
        $cabinas = Array();

        if (mysqli_num_rows($resultadoCab) > 0) {

            while($row = mysqli_fetch_assoc($resultadoCab)) {
                $cabina['idCabina']=$row['id_cabina'];
                $cabina['tipoCabina'] =  $row["tipo_cabina"];
                $cabinas[] = $cabina;
            }
        }
        return $cabinas;
    }
?>
