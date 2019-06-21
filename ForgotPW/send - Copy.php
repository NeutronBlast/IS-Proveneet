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
            $mail->Body = '<body>
<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-wrap">
                            <table  cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <img class="img-fluid" src="https://i.imgur.com/LZQChdD.png"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <h3>Confirmación de cambio de contraseña</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Usted ha solicitado un reseteo de contraseña para su cuenta, para proceder cliquee el enlace
                                    </td>
                                </tr>
                                    <td class="content-block aligncenter">
                                        <a href="'.$linkToSend .'" class="btn-primary">Restablecer  contraseña</a>
                                    </td>
                                <tr>
                                    <td class="content-block">
                                        Si usted no ha solicitado esta operación ignore el mensaje
                                    </td>
                                </tr>
                                <tr>

                                </tr>
                              </table>
                        </td>
                    </tr>
                </table>
                <div class="footer">
                    <table width="100%">
                    </table>
                </div></div>
        </td>
        <td></td>
    </tr>
</table>

</body>
';
$mail->IsHTML(true);

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
