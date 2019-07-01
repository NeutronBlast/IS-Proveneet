<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_POST['name'];
$code = $_POST['code'];

$sql = "SELECT * FROM products WHERE Nombre='$name' AND Codigo='$code'"; 
$result = mysqli_query($conn, $sql);

session_start();
    $_SESSION["Nombre"] = $name;
    $_SESSION["Codigo"] = $code;
    $_SESSION["clicked"] = true;
    
mysqli_close($conn);
?>