<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$user = $_POST['user'];
$pass = $_POST['password'];
$email = $_POST['email'];
$name = $_POST['name'];
$ln = $_POST['ln'];
$permissions = $_POST['permissions'];
$sql2 = "CREATE TABLE IF NOT EXISTS users (
    email VARCHAR(255),
    token VARCHAR(64),
)";
$sql = "INSERT INTO users (nombre, apellido, username, clave, email, permisos) VALUES ('$name', '$ln', '$user', '$pass', '$email', '$permissions')"; 

if ($conn->query($sql) === TRUE) {
    echo "Usuario creado satisfactoriamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>