<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_POST['name'];
$code = $_POST['code'];
$price = $_POST['price'];
$cat = $_POST['cat'];
$provider = $_POST['provider'];


$sql = "INSERT INTO products (Nombre, Codigo, Precio, Categoria, Proveedor) VALUES ('$name', '$code', '$price', '$cat', '$provider')"; 

if ($conn->query($sql) === TRUE) {
    echo "Producto añadido de manera exitosa";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>