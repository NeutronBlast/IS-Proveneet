<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

/*Fill table*/
$sqlQuery = "CREATE TABLE IF NOT EXISTS orders (
    Codigo VARCHAR(100) NULL,
    Solicitante VARCHAR(2500) NULL,
    Precio VARCHAR(100) NULL,
    Fecha VARCHAR(250) NOT NULL,
    Estatus VARCHAR(100) NOT NULL
    )";

if ($conn->query($sqlQuery) === TRUE) {
} else {
echo "Error creating SQL table: " . $conn->error;
}

$code = $_POST['prodcode'];
$owner = $_POST['prodowner'];
$price = $_POST['prodprice'];
$date = $_POST['proddate'];
$status = "Pendiente";


$sql = "INSERT INTO orders (Codigo, Solicitante, Precio, Fecha, Estatus) VALUES ('$code', '$owner', '$price', '$date', '$status')"; 

if ($conn->query($sql) === TRUE) {
    echo "Orden de compra creada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>