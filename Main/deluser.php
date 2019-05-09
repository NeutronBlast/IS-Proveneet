<?php
$servername = "localhost";
$username = "root";
$password = "metalsonic21";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$email = $_POST['email'];

$sql = "DELETE FROM users WHERE email = '$email'"; 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>