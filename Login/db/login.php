<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$user = $_POST['user'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$user' AND clave='$pass'"; 
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    session_start();
    $_SESSION["user"] = $user;
    $_SESSION["password"] = $pass;
    $_SESSION["loggedin"] = true;
    
    $sql_1 = "SELECT * FROM users WHERE email='$user' AND clave='$pass' AND permisos='Administrador'";
    $result_1 = mysqli_query($conn, $sql_1);
    if (mysqli_num_rows($result_1) > 0){
        $_SESSION["type"] = "Administrador";
        echo "Administrador";
        exit(0);
    }
    else{
        $_SESSION["type"] = "Empleado";
        echo "Empleado";
        exit(0);
    }

 } else {
    $msg = "Usuario y/o contraseña incorrectos";
    echo $msg;
 }

mysqli_close($conn);
?>