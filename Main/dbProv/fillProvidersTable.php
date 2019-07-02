<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";


$user = $_SESSION["user"];
$pass = $_SESSION["password"];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

/*Fill table*/
    $sqlQuery = "CREATE TABLE IF NOT EXISTS providers (
        Nombre VARCHAR(2500) NULL,
        Direccion VARCHAR(5000) NULL,
        Telefono VARCHAR(100) NULL,
        RIF VARCHAR(50) NOT NULL
        )";

if ($conn->query($sqlQuery) === TRUE) {
} else {
    echo "Error creating SQL table: " . $conn->error;
}

/*Fill table*/
$query = "SELECT * FROM providers"; 
$result3 = mysqli_query($conn, $query);
$result4 = mysqli_query($conn, $query);
$dataRow ="";
    while ($row = mysqli_fetch_array($result4)) {
        $dataRow = $dataRow."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
        </tr>";
    }
?>