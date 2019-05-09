<?php
$servername = "localhost";
$username = "root";
$password = "metalsonic21";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$rif = $_POST['rif'];

$sql = "DELETE FROM providers WHERE rif = '$rif'"; 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>