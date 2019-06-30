<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_POST['name'];
$dir = $_POST['dir'];
$phone = $_POST['phone'];
$rif = $_POST['nextrif'];
$prev = $_POST['rif'];

$sql1 = "SELECT nombre FROM providers WHERE rif='$prev' limit 1";
$result = mysql_query($sql1);
$value = mysql_fetch_object($result);
$provAnt = $value->nombre;

$sql = "UPDATE providers SET nombre = '$name', direccion = '$dir', telefono = '$phone',
rif = '$rif' WHERE rif='$prev'";
$sql2 = "UPDATE users SET Proveedor='$name' WHERE Proveedor=$provAnt" ;

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>