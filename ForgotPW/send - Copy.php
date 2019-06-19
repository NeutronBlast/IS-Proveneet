<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\composer\vendor\autoload.php';
$mail = new PHPMailer(TRUE);
/* Use SMTP. */
$mail->isSMTP();
/* Google (Gmail) SMTP server. */
$mail->Host = 'smtp.gmail.com';
/* SMTP port. */
$mail->Port = 587;
/* Set authentication. */
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
/* Username (email address). */
$mail->Username = 'proveneetis@gmail.com';
/* Google account password. */
$mail->Password = 'prov1157*';
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
        echo "success";
        $verifyScript = 'http://localhost/IS-Proveneet/ForgotPW/reset.php';
        $linkToSend = $verifyScript . '?&email=' . $user . '&token=' . $token;
        try {
            $mail->setFrom('usuarios@proveneet.com', 'Proveneet');
            $mail->addAddress($user, 'Emperor');
            $mail->Subject = 'Enlace para recuperar contraseña';
            $mail->Body = 'Este correo le ha llegado porque existe una solicitud de reestablecimiento de contraseña para el acceso al sistema de proveneet, si usted solicito esta peticion,
                            por favor ingrese en el siguiente enlace: '.$linkToSend .' Si no ignore este mensaje.';
            $mail->send();
         }
         catch (Exception $e)
         {
            /* PHPMailer exception. */
            echo $e->errorMessage();
         }
         catch (\Exception $e)
         {
            /* PHP exception (note the backslash to select the global namespace Exception class). */
            echo $e->getMessage();
         }
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
