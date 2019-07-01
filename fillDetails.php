<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$name = $_SESSION['Nombre'];
$code = $_SESSION['Codigo'];

if (isset($_SESSION['clicked']) && $_SESSION['clicked'] == true) {
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT Proveedor FROM products WHERE Codigo='$code'"; 
    $result = mysqli_query($conn, $sql);

    $valuep = mysqli_fetch_array($result);

    $sql2 = "SELECT Categoria FROM products WHERE Codigo='$code'"; 
    $result2 = mysqli_query($conn, $sql2);

    $valuep2 = mysqli_fetch_array($result2);

    $sql3 = "SELECT Precio FROM products WHERE Codigo='$code'"; 
    $result3 = mysqli_query($conn, $sql3);

    $valuep3 = mysqli_fetch_array($result3);
    
} else {
    header("Location: ../util/404.html");
}
mysqli_close($conn);
?>