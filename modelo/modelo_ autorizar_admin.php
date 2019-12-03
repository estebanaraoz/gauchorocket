<?php

$conn = getConexion();


if(isset($_POST['btselect'])){
	echo " 
		<br><br>
	<table class='table'>
	<tr>
            <th>id</th>
            <th>usuario</th>
            <th>tipo de usuario</th>
			<th>Email</th>
        </tr>";
		$user = $_POST['user'];

     $sql = "SELECT u.id_usuario as idusuario, u.nombre as nombre, u.email as email, tu.descripcion as tipo FROM usuario as u
				INNER JOIN tipo_usuario as tu on tu.id_tipo_usuario = u.id_tipo_usuario
				WHERE nombre = '$user' ;";
    $result = mysqli_query($conn, $sql) or die("Error al buscar usuario.");
	 
	 
                if (mysqli_num_rows($result) > 0) {
                    
                  while($row = mysqli_fetch_assoc($result)) {
                      //En cada vuelta del while crea una variable que contiene cada viaje.
                      $usuario = Array();
                      $usuario['idusuario'] =  $row["idusuario"];
                      $usuario['nombre'] =  $row["nombre"];
                      $usuario['tipo'] =  $row["tipo"];
                      $usuario['email'] =  $row["email"];
													
						echo   "<tr>
            <td>" . $usuario['idusuario'] . "</td>
            <td>" . $usuario['nombre'] . "</td>
            <td>" . $usuario['tipo'] . "</td>
            <td>" . $usuario['email'] . "</td>
            <td><a href='controlador_autorizar_admin.php?user=". $usuario['idusuario'] . "&tipo=". $usuario['tipo'] ."'>check-in</a></td>	
			</tr>
			</table>
			";							
															}
							}
			
				
				
			}				
			
				if(isset($_GET['user'])){
					$user = $_GET['user'];
				$tipo = $_GET['tipo'];
				 
				if ($tipo=='Administrador'){
					
				echo $user;
				 $sql ="UPDATE `usuario` SET `id_tipo_usuario = 2 WHERE id_usuario='$user'";
				mysqli_query($conn, $sql) or die("Error al cambiar2.");}
				else {
					
				 $sql ="UPDATE `usuario` SET `id_tipo_usuario`=1 WHERE id_usuario = '$user'";
				mysqli_query($conn, $sql) or die("Error al cambiar1.");
				}}
				
				
							
							
				?>