<?php
$servername = "localhost";
$username = "root";
$password = "metalsonic21";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$user = $_POST['user'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$user' AND clave='$pass'"; 
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $sql = "SELECT * FROM users WHERE email='$user' AND clave='$pass' AND permisos='Administrador'";
    if (mysqli_num_rows($result) > 0){
        echo "Logueado con éxito";
        //header('Location: ../Main/index.html');
        //exit;
    }
    else{
    echo "Logueado con éxito";
    //header('Location: ../Main/startemp.html');
    //exit;
    }

 } else {
    $url = "index.html";
    $timeout = 1;
    $msg = "Usuario y/o contraseña inválidos";
    echo $msg;
 }

mysqli_close($conn);
?>