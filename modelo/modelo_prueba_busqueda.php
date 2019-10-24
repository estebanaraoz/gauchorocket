<?php

include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
    //Realiza conexion con la base de datos.
    $conn = getConexion();

    if(isset($_POST['buscar'])){
      $origen = $_POST['origen'];
      $destino = $_POST['destino'];
      $fecha = $_POST['salida'];


      $criterio="";
      $sql = 'SELECT v.salida_viaje as salida_viaje,v.llegada_viaje as llegada_viaje,v.duracion,v.precio,v.id_tipo_viaje,l.nombre_lugar as lugar_origen,lu.nombre_lugar as lugar_destino
              FROM viaje v INNER JOIN lugar l
              on v.id_lugar_origen = l.id_lugar
              INNER JOIN lugar lu
              on v.id_lugar_destino = lu.id_lugar';

      if(!empty($origen)){
        $criterio = " where l.nombre_lugar = '$origen' ";
      }
      if(!empty($destino)){
          if(empty($criterio)){
          $criterio = " where l.nombre_lugar = '$destino' ";
        }
        else{
          $criterio.= " and l.nombre_lugar = '$destino'";
        }
      }
      if(!empty($fecha)){
        if(empty($fecha)){
          $criterio = " where v.salida_viaje = '$fecha' ";
        }
        else{
          $criterio.=" and v.salida_viaje = '$fecha'";
        }
      }
      $sql.=$criterio;

      $result = mysqli_query($conn, $sql)
                or die("Error al realizar la consulta de búsqueda");

                if (mysqli_num_rows($result) > 0) {

                  while($row = mysqli_fetch_assoc($result)) {
                      //En cada vuelta del while crea una variable que contiene cada viaje.
                      $viaje = Array();
                      // $viaje['idViaje'] =  $row["id_viaje"];
                      $viaje['salidaViaje'] =  $row["salida_viaje"];
                      $viaje['llegadaViaje'] =  $row["llegada_viaje"];
                      $viaje['duracion'] =  $row["duracion"];
                      $viaje['precio'] =  $row["precio"];
                      $viaje['idTipoViaje'] =  $row["id_tipo_viaje"];
                      $viaje['LugarOrigen'] =  $row["lugar_origen"];
                      $viaje['LugarDestino'] = $row["lugar_destino"];
                      $viajes[] = $viaje;
                  }
                  include($_SERVER["DOCUMENT_ROOT"]."/controlador/controlador_viajes.php");

                }else{
                  echo "No hay resultados para la búsqueda";
                }
    }
 ?>
