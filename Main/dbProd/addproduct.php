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
$sql2 = "CREATE TABLE IF NOT EXISTS products(
        Nombre VARCHAR(1500) NULL,
        Codigo VARCHAR(100) NULL,
        Precio VARCHAR(100) NULL,
        Categoria VARCHAR(250) NOT NULL,
        Proveedor VARCHAR(1500) NOT NULL
        )";

$sql = "INSERT INTO products (Nombre, Codigo, Precio, Categoria, Proveedor) VALUES ('$name', '$code', '$price', '$cat', '$provider')"; 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>