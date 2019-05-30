/*Get selected row in table*/
$(function() {
    var tr = $('#users').find('tr');
                    
    var name=null;
    var ln=null;
    var username=null;
    var password=null;
    var email=null;
    var perms=null;

    tr.bind('click', function(event) {
        $('#modify').attr("disabled", false);
        $('#delete').attr("disabled", false);
        var values = '';
        var tds = $(this).addClass('row-highlight').find('td');

        $.each(tds, function(index, item) {
            values = values + 'td' + (index + 1) + ':' + item.innerHTML + '<br/>';
            /* Gather values from the row*/
                if (index == 0){
                    start = values.indexOf(":");
                    end = values.indexOf("<");

                    name = values.slice(start+1,end);
                    values = "";
                }

                else if (index == 1){
                    start = values.indexOf(":");
                    end = values.indexOf("<");

                    ln = values.slice(start+1,end);
                    values = "";
                }

                else if (index == 2){
                    start = values.indexOf(":");
                    end = values.indexOf("<");

                    username = values.slice(start+1,end);
                    values = "";
                }

                else if (index == 3){
                    start = values.indexOf(":");
                    end = values.indexOf("<");

                    password = values.slice(start+1,end);
                    values = "";
                }

                else if (index == 4){
                    start = values.indexOf(":");
                    end = values.indexOf("<");

                    email = values.slice(start+1,end);
                    values = "";
                }

                else if (index == 5){
                    start = values.indexOf(":");
                    end = values.indexOf("<");

                    perms = values.slice(start+1,end);
                    values = "";
                }
        });
    
        $('#modify').click(function(event){
        //Open modal form to modify user
        $('#modify-user').modal()
        $('#modify-user').on('shown.bs.modal', function () {
        $('#modify-user').trigger('focus')})

        /*Replace placeholders with gathered values, ready to modify*/
        document.getElementById("musername").value = username;
        document.getElementById("mpw").value = password;
        document.getElementById("cmpw").value = password;
        document.getElementById("memail").value = email;
        document.getElementById("mname").value = name;
        document.getElementById("nln").value = ln;
            if (perms == "Administrador"){
                $("#r1").prop('checked',true);
            }
            else if (perms == "Empleado"){
                document.getElementById("r2").checked = true;
            }
        });

        $('#submitmod').click(function(event){ 
        var user = document.getElementById("musername").value;
        var password = document.getElementById("mpw").value;
        var confirm = document.getElementById("cmpw").value;
        var name = document.getElementById("mname").value;
        var ln = document.getElementById("nln").value;
        var newe = document.getElementById("memail").value;
        var permissions = null;
        var flag = 1;

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
            alert("Correo electrónico está asociado a una cuenta ya existente");
            next = false;
            break;
            }
            
        }

    /*Verify nickname*/
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

    /*Verify password*/
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

    if(password != confirm && flag){
    msg = "Contraseña y confirmar contraseña no coinciden";
    alert(msg);
    flag = 0;
    }

    /*Verify name*/
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

    /*Verify last name*/
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


    /*Verify email*/
    if(!newe && flag){
    var msg = "Ingrese un Correo electrónico";
    alert(msg);
    flag = 0;
    }

    if(!newe[4] && flag){
    msg = "Correo electrónico debe ser de longitud mayor a 5 letras";
    alert(msg);
    flag = 0;
    }

    if(newe[100] && flag){
    msg = "Correo electrónico demasiado largo";
    alert(msg);
    flag = 0;
    }

    var patt = new RegExp(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);
    next = patt.test((String)(newe));

    if (!next && flag){
    msg = "Ingrese una dirección de correo electrónico válida";
    alert(msg);
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
    });