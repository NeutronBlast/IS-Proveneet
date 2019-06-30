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

$sql = "INSERT INTO providers (nombre, direccion, telefono, rif) VALUES ('$name', '$dir', '$phone', '$rif')"; 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>