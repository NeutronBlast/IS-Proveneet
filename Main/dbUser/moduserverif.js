/*Get selected row in table*/
function getSelectedRow(){
    //Open modal form to modify user
    $('#modify-user').modal()
    $('#modify-user').on('shown.bs.modal', function () {
    $('#modify-user').trigger('focus')
    })

$("#users tr").click(function() {
var name=null;
var ln=null;
var username=null;
var password=null;
var email=null;
var perms=null;
var index = 0;

$(this).find("td").each(function(){
        /* Gather values from the row*/
            if (index == 0){    
                name = $(this).html();
            }

            else if (index == 1){
                ln= $(this).html();
            }

            else if (index == 2){
                username=$(this).html();
            }

            else if (index == 3){
                password=$(this).html();
            }

            else if (index == 4){
                email=$(this).html();
            }

            else if (index == 5){
                perms=$(this).html();
            }
            index++;
    });

    var foolproof = document.getElementById("custId").value;

    /*Replace placeholders with gathered values, ready to modify*/
    document.getElementById("musername").value = username;
    document.getElementById("mpw").value = password;
    document.getElementById("cmpw").value = password;
    document.getElementById("memail").value = email;
    document.getElementById("mname").value = name;
    document.getElementById("nln").value = ln;

    if (foolproof == email){
        $("#r1").prop('disabled', true);
        $("#r2").prop('disabled', true);
    }

        if (perms == "Administrador"){
            $("#r1").prop('checked',true);
        }
        else if (perms == "Empleado"){
            document.getElementById("r2").checked = true;
        }

    $('#submitmod').click(function(event){ 
    var user = document.getElementById("musername").value;
    var password = document.getElementById("mpw").value;
    var confirm = document.getElementById("cmpw").value;
    var name = document.getElementById("mname").value;
    var ln = document.getElementById("nln").value;
    var newe = document.getElementById("memail").value;
    var permissions = null;
    var flag = 1;
    type = 0;

    var allM = [];
    var table = document.getElementById("users");
    for (var i = 0, row; row = table.rows[i]; i++) {
    for (var j = 0, col; col = row.cells[j]; j++) {
        if (j == 4){
        allM.push(col.innerHTML);
        }
    }  
    }

    var cont = 0;
    if (email != newe)
        allM.push(newe);
    /*If the user tries to modify an email from an account different from the one that is already set and it's on the database it will trigger an error*/
    for(var i = 0; i < allM.length; i++){
        if (newe == allM[i]){
            cont++;
        }
        
        if (cont >=2){
        flag = 0;
        type = 6;
        alert("Correo electrónico está asociado a una cuenta ya existente");
        continue;
        }

        if (flag == 0)
            break;
        
    }

/*Verify nickname*/
if(!user && flag){
msg = "Ingrese un Nick";
alert(msg);
flag = 0;
type = 1;
}

if(!user[1] && flag){
msg = "Nick usuario debe ser de longitud mayor a 2 letras";
alert(msg);
flag = 0;
type = 1;
}

if(user[100] && flag){
msg = "Nick usuario demasiado largo";
alert(msg);
flag = 0;
type = 1;
}

/*Verify password*/
if(!password && flag){
msg = "Ingrese una contraseña de usuario";
alert(msg);
flag = 0;
type = 2;
}

if(!password[7] && flag){
msg = "Contraseña de usuario debe ser de longitud mayor a 8 caracteres";
alert(msg);
flag = 0;
type = 2;
}

if(password != confirm && flag){
msg = "Contraseña y confirmar contraseña no coinciden";
alert(msg);
flag = 0;
type = 3;
}

/*Verify name*/
if(!name && flag){
msg = "Ingrese un nombre de usuario";
alert(msg);
flag = 0;
type = 4;
}

if(!name[1] && flag){
msg = "Nombre de usuario debe ser mayor a 2";
alert(msg);
flag = 0;
type = 4;
}

if(name[100] && flag){
msg = "Nombre de usuario demasiado largo";
alert(msg);
flag = 0;
type = 4;
}


if (!/^([A-z])*$/.test(name) && flag){
alert("Su nombre contiene números");
flag = 0;
type = 4;
}

/*Verify last name*/
if(!ln && flag){
msg = "Ingrese un apellido de usuario";
alert(msg);
flag = 0;
type = 5;
}

if(!ln[1] && flag){
msg = "Apellido de usuario debe ser mayor a 2";
alert(msg);
flag = 0;
type = 5;
}

if(ln[100] && flag){
msg = "Apellido de usuario demasiado largo";
alert(msg);
flag = 0;
type = 5;
}

if (!/^([A-z])*$/.test(ln) && flag){
alert("Su apellido contiene números");
flag = 0;
type = 5;
}


/*Verify email*/
if(!newe && flag){
var msg = "Ingrese un Correo electrónico";
alert(msg);
flag = 0;
type = 6;
}

if(!newe[4] && flag){
msg = "Correo electrónico debe ser de longitud mayor a 5 letras";
alert(msg);
flag = 0;
type = 6;
}

if(newe[100] && flag){
msg = "Correo electrónico demasiado largo";
alert(msg);
flag = 0;
type = 6;
}

var patt = new RegExp(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);
next = patt.test((String)(newe));

if (!next && flag){
msg = "Ingrese una dirección de correo electrónico válida";
alert(msg);
type = 6;
flag = 0;
}

    if (document.getElementById("r1").checked){
        permissions = document.getElementById("r1").value;
    }
    else if (document.getElementById("r2").checked){
        permissions = document.getElementById("r2").value;
    }

if(!permissions && flag){
    msg = "Debe seleccionar uno de los permisos";
    alert(msg);
    flag = 0;
}

if (permissions != perms && flag){
    var master = prompt('La siguiente operación es muy delicada, si desea continuar ingrese la clave maestra');
        if (master != null && master != "" && master == "proveneet") {
            flag = 1;
        }
        else{
            alert("La contraseña maestra es inválida");
            flag = 0;
        }
        }

//Change borders

if (type == 1){
    $('#musername').css({"color":"red","border":"1px solid red"});
}

if (type == 2){
    $('#mpw').css({"color":"red","border":"1px solid red"});
}

if (type == 3){
    $('#mpw').css({"color":"red","border":"1px solid red"});
    $('#cmpw').css({"color":"red","border":"1px solid red"});
}

if (type == 4){
    $('#mname').css({"color":"red","border":"1px solid red"});
}

if (type == 5){
    $('#nln').css({"color":"red","border":"1px solid red"});
}

if (type == 6){
    $('#memail').css({"color":"red","border":"1px solid red"});
}

//Set back to default when user starts correcting the mistake

$("#musername").keyup(function(){
  $("#musername").css({"color":"","border":""});
});

$("#mpw").keyup(function(){
    $("#mpw").css({"color":"","border":""});
    $("#cmpw").css({"color":"","border":""});
});

$("#cmpw").keyup(function(){
    $("#mpw").css({"color":"","border":""});
    $("#cmpw").css({"color":"","border":""});
});

$("#mname").keyup(function(){
  $("#mname").css({"color":"","border":""});
});

$("#nln").keyup(function(){
  $("#nln").css({"color":"","border":""});
});

$("#memail").keyup(function(){
  $("#memail").css({"color":"","border":""});
});

/*After all info is correct we send to ajax to insert to database*/
if (flag){    
$.ajax({
type:"POST",
url:"../dbUser/moduser.php",
async: false,
data: {user:user,password:password,name:name,ln:ln,newe:newe,permissions:permissions,email:email},
success: function(data){
alert(data);
    window.location = 'manageusers.php';
}
});
}
});
});
}