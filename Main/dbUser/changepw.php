<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";

session_start();

$user = $_POST['e'];
$pass = $_POST['newp'];

$_SESSION["user"] = $user;
$_SESSION["password"] = $pass;

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE users SET clave='$pass' WHERE email='$user'";
$result = mysqli_query($conn, $sql);

echo $user;
echo $pass;

    if ($conn->query($sql) === TRUE) {
        echo "Contraseña cambiada con exito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

mysqli_close($conn);
?>