<?php
$servername = "localhost";
$username = "root";
$password = "metalsonic21";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$user = $_POST['user'];
$pass = $_POST['password'];
$email = $_POST['email'];
$name = $_POST['name'];
$ln = $_POST['ln'];
$permissions = $_POST['permissions'];

$sql = "INSERT INTO users (nombre, apellido, username, clave, email, permisos) VALUES ('$name', '$ln', '$username', '$pass', '$email', '$permissions')"; 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>