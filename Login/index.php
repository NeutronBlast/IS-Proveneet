<!DOCTYPE html>
<html lang="en">
<head>
	<title>Proveneet</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://www.gstatic.com/firebasejs/5.11.1/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.11.1/firebase-auth.js"></script>
<!--===============================================================================================-->	
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

</head>

<body>
	
	<div class="limiter">
		<!-- Here's the background -->
		<div class="container-login100" style="background-image: url('images/bg-02.jpg');">
			<!-- Login container -->
			<div class="wrap-login100">
				<div class="login100-form validate-form">
					<span class="login100-form-logo">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Bienvenido
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" id="user" name="username" placeholder="Nombre de usuario o Correo electrónico">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" id="pass" name="pass" placeholder="Contraseña">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Recordar en este equipo
						</label>
					</div>

					<div class="container-login100-form-btn">
						<a class="login100-form-btn" id = "logBtn">
							Iniciar sesión
						</a>
					</div>					

					<div class="text-center p-t-90">
						<a class="txt1" href="../ForgotPW/form.html">
							¿Ha olvidado la contraseña?
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
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
	<script src="js/main.js"></script>
	<script src="js/fb.js"></script>
<!--===============================================================================================-->
	<script>
	$('#logBtn').click(function(event){ 
	user = document.getElementById("user").value;
	password = document.getElementById("pass").value;
	
	$.ajax({
		type:"POST",
		url:"login.php",
		async: false,
		data: {user:user,password:password},
		success: function(data){
			if(data == 'Administrador'){
                window.location.href='../Main/index.php';
             }
             else if(data == 'Empleado'){
                window.location.href='../Main/startemp.html';
             }else{
               alert("Usuario o contraseña inválidos");
			 }
		}
		});
	});
	</script>
	
  <input type="hidden" name="count" id="user" value="<?= $user  ?>" />

</body>
</html>