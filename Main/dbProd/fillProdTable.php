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
$query = "SHOW TABLES LIKE 'products'"; 
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0){
    $sqlQuery = "CREATE TABLE products (
        Nombre VARCHAR(1500) NULL,
        Codigo VARCHAR(100) NULL,
        Precio VARCHAR(100) NULL,
        Categoria VARCHAR(250) NOT NULL,
        Proveedor VARCHAR(1500) NOT NULL
        )";

if ($connection->query($sqlQuery) === TRUE) {
    echo "Table created successfully!";
} else {
    echo "Error creating SQL table: " . $connection->error;
}
}

else{
$query="SELECT * FROM products";
$result3 = mysqli_query($conn, $query);
$result4 = mysqli_query($conn, $query);
$dataRow ="";
    while ($row = mysqli_fetch_array($result3)) {
        $dataRow = $dataRow."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
        <td>$row[4]</td></tr>";
    }
}
?>