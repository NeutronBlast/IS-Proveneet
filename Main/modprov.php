<?php
$servername = "localhost";
$username = "root";
$password = "metalsonic21";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_POST['name'];
$dir = $_POST['dir'];
$phone = $_POST['phone'];
$rif = $_POST['nextrif'];
$prev = $_POST['rif'];

$sql = "UPDATE providers SET nombre = '$name', direccion = '$dir', telefono = '$phone',
rif = '$rif' WHERE rif='$prev'"; 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>