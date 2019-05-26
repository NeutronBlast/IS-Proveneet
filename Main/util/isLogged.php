<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

session_start();
$user = $_SESSION['user'];

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT nombre FROM users WHERE email='$user'"; 
    $result = mysqli_query($conn, $sql);

    $value = mysqli_fetch_array($result);

    $sql2 = "SELECT apellido FROM users WHERE email='$user'"; 
    $result2 = mysqli_query($conn, $sql2);

    $value2 = mysqli_fetch_array($result2);
    
} else {
    header("Location: ../util/404.html");
}
mysqli_close($conn);
?>