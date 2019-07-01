<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$code = $_POST['code'];
$status = $_POST['stats'];


$sql = "UPDATE orders SET Estatus = '$status' WHERE Codigo = '$code'"; 

if ($conn->query($sql) === TRUE) {
    echo "Orden de compra modificada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>