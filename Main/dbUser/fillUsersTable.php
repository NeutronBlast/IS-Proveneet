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

$sql3 = "SELECT email FROM users WHERE email='$user' AND clave='$pass'"; 
$result3 = mysqli_query($conn, $sql3);
$value3 = mysqli_fetch_array($result3);

/*Fill table*/
$query = "SELECT * FROM users"; 
$result3 = mysqli_query($conn, $query);
$result4 = mysqli_query($conn, $query);
$dataRow ="";
    while ($row = mysqli_fetch_array($result4)) {
        $dataRow = $dataRow."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
        <td>$row[4]</td><td>$row[5]</td></tr>";
    }
?>