<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$email = $_POST['email'];

$sql = "DELETE FROM users WHERE email = '$email'"; 

if ($conn->query($sql) === TRUE) {
    echo "Usuario eliminado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>