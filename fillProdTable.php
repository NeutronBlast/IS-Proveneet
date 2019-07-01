<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

/*Fill table*/
    $sqlQuery = "CREATE TABLE IF NOT EXISTS products (
        Nombre VARCHAR(1500) NULL,
        Codigo VARCHAR(100) NULL,
        Precio VARCHAR(100) NULL,
        Categoria VARCHAR(250) NOT NULL,
        Proveedor VARCHAR(1500) NOT NULL
        )";

if ($conn->query($sqlQuery) === TRUE) {
} else {
    echo "Error creating SQL table: " . $conn->error;
}

$query="SELECT * FROM products";
$result3 = mysqli_query($conn, $query);
$result4 = mysqli_query($conn, $query);
$dataRow ="";
    while ($row = mysqli_fetch_array($result3)) {
        $dataRow = $dataRow."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
        <td>$row[4]</td></tr>";
    }
?>