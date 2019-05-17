<?php
$servername = "localhost";
$username = "root";
$password = "metalsonic21";
$dbname = "proveneet";

session_start();

$conn = new mysqli($servername, $username, $password, $dbname);

$user = $_POST['user'];



$sql = "SELECT * FROM users WHERE email='$user'"; 
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "success";

    $sql2 = "UPDATE users SET clave = '$user' WHERE email='$user'"; 

    if ($conn->query($sql2) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
    exit(0);
    }

    else{
        $user = "0";
        exit(0);
    }

mysqli_close($conn);
?>