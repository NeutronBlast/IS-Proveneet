<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$code = $_POST['code'];

$sql = "DELETE FROM orders WHERE Codigo = '$code'"; 

if ($conn->query($sql) === TRUE) {
    echo "Orden de compra anulada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>