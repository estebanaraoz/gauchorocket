<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/public/header.php");
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
    //Realiza conexion con la base de datos.
    $conn = getConexion();
    


        
        $userCookie= $_SESSION['user']["id_usuario"];
	  
	  
	  
	  /*
	  $i=0;
	   do{
		   $i++;
		  $sql = "INSERT INTO `ubicacion_cabina`( `nombre`, `id_cabina`) VALUES ('S".$i."',3) ";
     mysqli_query($conn, $sql) or die("Error al buscar usuario.");
		 
	  }while($i<100);
	  
      $sql = "INSERT INTO `ubicacion_cabina`(`id_ubicacion_cabina`, `nombre`, `id_cabina`) VALUES (,'General ".$i."',1) ";
    $result = mysqli_query($conn, $sql) or die("Error al buscar usuario.");*/
	  
	 
	 
	 
               /* if (mysqli_num_rows($result) > 0) {
                    
                  while($row = mysqli_fetch_assoc($result)) {
                      //En cada vuelta del while crea una variable que contiene cada viaje.
                      $reserva = Array();
                      $reserva['idreserva'] =  $row["id_reserva"];
                      $reserva['vencimiento'] =  $row["vencimiento"];
                      $reserva['estado'] =  $row["estado"];
                      $reserva['cabina'] =  $row["tipo_cabina"];
                      $reserva['servicio'] =  $row["tipo_servicio"];
                      $reserva['precio'] =  $row["precio"];
					  $reserva['idestado'] =  $row["idestado"];
                      $reservas[] = $reserva;
                      
                  }
                  // include($_SERVER["DOCUMENT_ROOT"]."/controlador/controlador_viajes.php");

                }
	
	}*/
				
       
    

      
 ?>