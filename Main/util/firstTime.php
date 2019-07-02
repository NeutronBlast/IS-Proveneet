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
    $sqlQuery = "CREATE TABLE IF NOT EXISTS users (
        nombre VARCHAR(100) NULL,
        apellido VARCHAR(100) NULL,
        username VARCHAR(50) NULL,
        clave VARCHAR(50) NULL,
        email VARCHAR(150) NULL,
        permisos VARCHAR(20) NOT NULL
        )";

if ($conn->query($sqlQuery) === TRUE) {
} else {
    echo "Error creating SQL table: " . $conn->error;
}

    $sql4 = "CREATE TABLE IF NOT EXISTS resetpw (
        email VARCHAR(255),
        token VARCHAR(64)
    )";

if ($conn->query($sql4) === TRUE) {
} else {
    echo "Error creating SQL table: " . $conn->error;
}
?>