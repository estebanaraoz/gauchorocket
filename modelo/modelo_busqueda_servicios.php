<?php
    function getTipoDeServicio(){
        $conexion = getConexion();
        $query = "select * from servicio;";
        $resultado = mysqli_query($conexion,$query)
        or die("Error al realizar la consulta de búsqueda");
        $servicios = Array();

        if (mysqli_num_rows($resultado) > 0) {

            while($row = mysqli_fetch_assoc($resultado)) {

                $servicio['idServicio'] =  $row["id_servicio"];
                $servicio['tipoServicio'] =  $row["tipo_servicio"];
                $servicios[] = $servicio;
            }
        }
        return $servicios;
    }
?>
