<?php
$servername = "localhost";
$username = "root";
$password = "metalsonic21";
$dbname = "proveneet";

session_destroy();
session_start();

$_SESSION["user"] = $user;
$_SESSION["password"] = $pass;

$conn = new mysqli($servername, $username, $password, $dbname);

$user = $_POST['e'];
$pass = $_POST['newp'];

$sql = "UPDATE users SET clave='$pass' WHERE email='$user'";
$result = mysqli_query($conn, $sql);

echo $user;
echo $pass;

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

mysqli_close($conn);
?>