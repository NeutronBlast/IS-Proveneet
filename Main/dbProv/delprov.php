<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$rif = $_POST['rif'];
$result = $conn->query("SELECT nombre FROM providers WHERE rif='$rif' limit 1")->fetch_object()->nombre; 
$sql = "DELETE FROM providers WHERE rif = '$rif'"; 
$sql2= "DELETE FROM products WHERE Proveedor='$result'";

if ($conn->query($sql)&&$conn->query($sql2) === TRUE) {
    echo "Proveedor elminado de manera exitosa";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>