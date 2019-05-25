<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$user = $_POST['user'];
$pass = $_POST['password'];
$email = $_POST['newe'];
$name = $_POST['name'];
$ln = $_POST['ln'];
$prev = $_POST['email'];
$permissions = $_POST['permissions'];

$sql = "UPDATE users SET nombre = '$name', apellido = '$ln', username = '$user',
clave = '$pass', email = '$email', permisos = '$permissions' WHERE email='$prev'"; 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>