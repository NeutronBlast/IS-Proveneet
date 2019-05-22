<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["password"];

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT nombre FROM users WHERE email='$user' AND clave='$pass'"; 
$result = mysqli_query($conn, $sql);

$value = mysqli_fetch_array($result);

$sql2 = "SELECT apellido FROM users WHERE email='$user' AND clave='$pass'"; 
$result2 = mysqli_query($conn, $sql2);

$value2 = mysqli_fetch_array($result2);
mysqli_close($conn);
?>