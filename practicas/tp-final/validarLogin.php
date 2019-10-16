<?php
if(isset($_POST['login'])){
    $user = $_POST['user'];
    $password = md5($_POST['pass']);

    $conexion = mysqli_connect('localhost','root',"",'tpfinal')
	  or die(mysqli_errno);

    $query = "select * from cliente where usuario='" .$user. "' and password='" .$password. "' ";

    $resultado = mysqli_query($conexion,$query);

    if(mysqli_num_rows($resultado) > 0){
        // header("Location:index.php");
        echo "Estás logueado";
        exit();
    }
    else {
      echo "Usuario o contraseña inválidos";
    }
}

?>
