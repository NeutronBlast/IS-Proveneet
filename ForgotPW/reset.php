<!DOCTYPE html>
<html lang="en">
<head>
	<title>Proveneet</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Icon -->
    <link rel="icon" type="image/png" href="images/icons/logo.png"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->



    </head>
    <body>
    <div class="container-login100" style="background-image: url('images/bg-02.jpg');">
	<div class="row">
	<div class="col-md-4 col-md-offset-4">
    <div class="wrap-login100">
    <div class="panel-body">
    <div class="text-center">
    <h3><i class="fa fa-unlock-alt fa-4x" style="color:white;"></i></h3>
    <h2 class="text-center text-white">Restablecer contraseña</h2>
    <br>
    <div class="panel-body">
    <form id="register-form" role="form" autocomplete="off" class="form" method="post">


<!-- New password -->
    <div class="form-group">
    <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
    <input id="pass" name="pass" placeholder="Contraseña" class="form-control"  type="password">
    </div>
    </div>

<!-- New password -->
    <div class="form-group">
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <input id="cpass" name="cpass" placeholder="Confirmar contraseña" class="form-control"  type="password">
        </div>
        </div>
    <br>

    <div class="container-login100-form-btn">
    <button class="login100-form-btn" id = "resetButton">
            Restablecer contraseña
    </button>
    </div>
                      
    <input type="hidden" class="hide" name="token" id="token" value=""> 
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript">
    $('#resetButton').click(function(event){ 
    pass = document.getElementById("pass").value;
    url = window.location.href;  
    searchParams = new URLSearchParams(url);
    email = searchParams.get('email');
    token = searchParams.get('token');
    $.ajax({
        type:"POST",
        url:"step2.php",
        async: false,
        data: {pass:pass,token:token,email:email},
        success: function(data){
            if(data != 'success'){                
                alert("Usuario no existe en el sistema");
             }
            else{            
               alert("Se ha restablecido su contraseña a su dirección de correo electrónico, por favor cámbiela en gestión de perfil");        
             }
        }

        });

    });
    </script>
<!--===============================================================================================-->

  
</body>
</html>