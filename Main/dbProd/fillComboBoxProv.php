<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT CONCAT (Nombre, ' ', Direccion) AS Nombre FROM providers"; 
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql);

?>