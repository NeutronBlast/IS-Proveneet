$('#addusr').click(function(event){ 
    /*Get HTML values*/
    var user = document.getElementById("user").value;
    var password = document.getElementById("pass").value;
    var password2 = document.getElementById("conpw").value;
    var name = document.getElementById("name").value;
    var ln = document.getElementById("ln").value;
    var email = document.getElementById("email").value;
    var permissions = null;
    var flag = true;

    /*Validate user*/
    if(!user && flag){
        msg = "Ingrese un Nick";
        alert(msg);
        flag = 0;
    }

    if(!user[1] && flag){
        msg = "Nick usuario debe ser de longitud mayor a 2 letras";
        alert(msg);
        flag = 0;
    }

    if(user[100] && flag){
        msg = "Nick usuario demasiado largo";
        alert(msg);
        flag = 0;
    }

    /*Validate password*/
    if(!password && flag){
        msg = "Ingrese una contraseña de usuario";
        alert(msg);
        flag = 0;
    }

    if(!password[7] && flag){
        msg = "Contraseña de usuario debe ser de longitud mayor a 8 caracteres";
        alert(msg);
        flag = 0;
    }

    if(password != password2 && flag){
        msg = "Contraseña y confirmar contraseña no coinciden";
        alert(msg);
        flag = 0;
    }

    //Validations of name var.
    if(!name && flag){
        msg = "Ingrese un nombre de usuario";
        alert(msg);
        flag = 0;
    }

    if(!name[1] && flag){
        msg = "Nombre de usuario debe ser mayor a 2";
        alert(msg);
        flag = 0;
    }

    if(name[100] && flag){
        msg = "Nombre de usuario demasiado largo";
        alert(msg);
        flag = 0;
    }


    if (!/^([A-z])*$/.test(name) && flag){
        alert("Su nombre contiene números");
        flag = 0;
    }

    /*Validate last name*/
    if(!ln && flag){
        msg = "Ingrese un apellido de usuario";
        alert(msg);
        flag = 0;
    }

    if(!ln[1] && flag){
        msg = "Apellido de usuario debe ser mayor a 2";
        alert(msg);
        flag = 0;
    }

    if(ln[100] && flag){
        msg = "Apellido de usuario demasiado largo";
        alert(msg);
        flag = 0;
    }
    
    if (!/^([A-z])*$/.test(ln) && flag){
        alert("Su apellido contiene números");
        flag = 0;
    }
      

    /*Validate e-mail*/
    if(!email && flag){
        var msg = "Ingrese un Correo electrónico";
        alert(msg);
        flag = 0;
    }

    if(!email[4] && flag){
        msg = "Correo electrónico debe ser de longitud mayor a 5 letras";
        alert(msg);
        flag = 0;
    }

    if(email[100] && flag){
        msg = "Correo electrónico demasiado largo";
        alert(msg);
        flag = 0;
    }

    var patt = new RegExp(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);
    next = patt.test((String)(email));

    if (!next && flag){
        msg = "Ingrese una dirección de correo electrónico válida";
        alert(msg);
    }

    if (document.getElementById("r3").checked){
        permissions = document.getElementById("r3").value;
    }
    else if (document.getElementById("r4").checked){
        permissions = document.getElementById("r4").value;
    }

    if(!permissions && flag){
        msg = "Debe seleccionar uno de los permisos";
        alert(msg);
        flag = 0;
    }

    /*Verify that email is unique*/
    //This function iterates through all the table and saves all the emails in an array
    var allM = [];
    var table = document.getElementById("users");
    for (var i = 0, row; row = table.rows[i]; i++) {
        for (var j = 0, col; col = row.cells[j]; j++) {
            if (j == 4){
           allM.push(col.innerHTML);
            }
        }  
    }

    //This other function iterates through all the array and searches for coincidences
    for(var i = 0; i < allM.length; i++){
        if (email == allM[i]){
            alert("Correo electrónico está asociado a una cuenta ya existente");
            next = false;
            break;
            flag = 0;
        }
    }

    //Once all data is verified it sends to PHP file to be stored in the database

    if (flag != 0){
    $.ajax({
        type:"POST",
        url:"../dbUser/adduser.php",
        async: false,
        data: {user:user,password:password,name:name,ln:ln,email:email,permissions:permissions},
        success: function(data){
        alert(data);
            //window.location = '../Main/index.html';
        }
        });
    }
});