<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_POST['name'];
$dir = $_POST['dir'];
$phone = $_POST['phone'];
$rif = $_POST['rif'];
$sql4 = "CREATE TABLE IF NOT EXISTS providers (
nombre VARCHAR(2500), direccion VARCHAR(5000), telefono VARCHAR(100), rif VARCHAR(50)
)";
$sql = "INSERT INTO providers (nombre, direccion, telefono, rif) VALUES ('$name', '$dir', '$phone', '$rif')"; 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>