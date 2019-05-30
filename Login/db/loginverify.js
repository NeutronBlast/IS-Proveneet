	$("#user").keyup(function (event) {
	  if (event.keyCode == 13) {
		  $("#logBtn").click();
	  }
	});

$(document).ready(function() {
	$("#pass").keyup(function (event) {
	  if (event.keyCode == 13) {
		  $("#logBtn").click();
	  }
	});
  });  


$('#logBtn').click(function(event){ 
	user = document.getElementById("user").value;
	password = document.getElementById("pass").value;
	var flag = 1;
	if(!user){
		msg = "Ingrese un nombre de usuario";
		alert(msg);
		flag = 0;
	}

	if(!user[1] && flag){
		msg = "Nombre de usuario debe ser mayor a 2 caracteres";
		alert(msg);
		flag = 0;
	}

	if(user[100] && flag){
		msg = "Nombre de usuario demasiado largo (no se admiten más de 100 caracteres)";
		alert(msg);
		flag = 0;
	}
	
	if(flag){
	$.ajax({
		type:"POST",
		url:"db/login.php",
		async: false,
		data: {user:user,password:password},
		success: function(data){
			if(data == 'Administrador'){
                window.location.href='../Main/adminview/index.php';
             }
             else if(data == 'Empleado'){
                window.location.href='../Main/empview/startemp.php';
             }else{
               alert("Usuario o contraseña inválidos");
			 }
		}
		});
	}
	});