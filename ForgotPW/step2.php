<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";
$conn = new mysqli($servername, $username, $password, $dbname);
$pass = $_POST['pass'];
$user = $_POST['email'];
$token = $_POST['token'];

$sql = "SELECT * FROM resetpw WHERE email='$user' AND token='$token'"; 
$result = mysqli_query($conn, $sql);
session_start();

if (mysqli_num_rows($result) > 0) {   

    $sql2 = "UPDATE users SET clave = '$pass' WHERE email='$user'";    
    if ($conn->query($sql2) === TRUE) {
        $sql3 = "DELETE FROM resetpw WHERE email='$user'" ;
        if($conn->query($sql3) ===TRUE)
        echo "success";
        else echo "Error:" . $sql3. "<br>".$conn->error;
        exit(0);
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
    exit(0);
    }else{

        $user = "0";
        exit(0);
    }

mysqli_close($conn);
?>