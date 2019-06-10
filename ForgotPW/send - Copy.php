<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "proveneet";
$dbname = "proveneet";
$conn = new mysqli($servername, $username, $password, $dbname);
$user = $_POST['user'];
$sql = "SELECT * FROM users WHERE email='$user'"; 
$result = mysqli_query($conn, $sql);
session_start();
if (mysqli_num_rows($result) > 0) {   
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);
    $sql2 = "INSERT INTO resetpw (email,token) VALUES ('$user', '$token')"; 

    if ($conn->query($sql2) === TRUE) {
        echo "success  :";
        $verifyScript = 'http://localhost/IS-Proveneet/ForgotPW/reset.php';
        $linkToSend = $verifyScript . '?&email=' . $user . '&token=' . $token;
        echo $linkToSend;
        exit(0);
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
