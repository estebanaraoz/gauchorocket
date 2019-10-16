<?php

$nomyap = $_POST["nombre"];
$edad = $_POST["edad"];
$sexo = $_POST["sexo"];
$fechanac = $_POST["fechanac"];
$ocupacion = $_POST["ocupacion"];

echo "Nombre y apellido: ".$nomyap;
echo "<br><br>"."Edad: ".$edad;
echo "<br><br>"."Sexo: ".$sexo;
echo "<br><br>"."Fecha de nacimiento: ".$fechanac;
echo "<br><br>"."Ocupacion: ".$ocupacion;


// session_start();    //crear o usar una sesión existente

// $_SESSION['user']=true;   //crea una variable user en el array de session y la declara como true

// if(isset($_SESSION['user'])){
//   ...
// } //verifica que la sesión sea true

// $_SESSION_START();
// $_SESSION_DESTROY();     //Destruye la sesión. se necesita que esté el start arriba sino no reconoce ninguna sesión

// header("location: ppal.php")
// exit();                            //Redirigir  a otro archivo


// validar y redirigir a ppal si esta ok y sino al login nuevamente
?>
