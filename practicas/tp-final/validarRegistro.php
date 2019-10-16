<?php
if(isset($_POST['registrarse'])){
    $user = $_POST['user'];
    $password = md5($_POST['pass']);
    $email = $_POST['email'];

    $conexion = mysqli_connect('localhost','root',"",'tpfinal')
	  or die(mysqli_errno);

    $queryVerificacionUsuario = "select * from cliente where usuario='" .$user. "'";
    $queryVerificacionMail = "select * from cliente where email='" .$email. "'";

    $resultadoVerificacionUsuario = mysqli_query($conexion,$queryVerificacionUsuario);
    $resultadoVerificacionMail = mysqli_query($conexion,$queryVerificacionMail);

    if(mysqli_num_rows($resultadoVerificacionUsuario) ==0){
      if(mysqli_num_rows($resultadoVerificacionMail) ==0){
        $query = "insert into cliente(usuario,password,email, tipo_cliente)values(\"$user\",\"$password\",\"$email\",2);"
        or die(mysqli_errno);
        $resultado = mysqli_query($conexion,$query);
            header("Location:index.php");
            exit();
      }
      else{
        echo "El mail ya fue utilizado";
        exit();
      }
    }
    else {
      echo "El usuario ya fue utilizado";
      exit();
    }

}

?>
