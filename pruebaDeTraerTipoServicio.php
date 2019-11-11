<?php
function getTipoDeServicio(){
        $conexion = getConexion();
        $query = "select * from servicio; ";
        $resultado = mysqli_query($conexion,$query);
        $servicios = Array();

        if (mysqli_num_rows($resultado) > 0) {

            while($row = mysqli_fetch_assoc($resultado)) {

                $servicio['id'] =  $row["id_servicio"];
                $servicio['tipo'] =  $row["tipo_servicio"];
                $servicios[] = $servicio;
            }
        }
        return $servicios;
      }
?>