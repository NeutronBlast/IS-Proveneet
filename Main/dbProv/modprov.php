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

$result = $conn->query("SELECT nombre FROM providers WHERE rif='$prev' limit 1")->fetch_object()->nombre; 


$sql = "UPDATE providers SET nombre = '$name', direccion = '$dir', telefono = '$phone',
rif = '$rif' WHERE rif='$prev'";

$sql2 = "UPDATE products SET Proveedor='$name' WHERE Proveedor='$result'" ;

if ($conn->query($sql) && $conn->query($sql2) === TRUE) {
    echo "Proveedor modificado de manera exitosa";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>