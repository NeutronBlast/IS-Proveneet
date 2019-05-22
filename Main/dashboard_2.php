<?php
	require ('db\fillUsersTable.php');
?>
   
   
   <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Proveneet</title>
        <!-- Icon -->
        <link rel="icon" type="image/png" href="img/logo.png"/> 

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Toastr style -->
        <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

        <!-- Gritter -->
        <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

        <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        

    </head>

    <body>
            <div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
            <div class="dropdown profile-element">
            <!-- Image (always default) -->
            
            <img alt="image" class="rounded-circle" src="img/pfp_small.jpg"/>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <!-- Placeholder name and last name -->
            
            <span class="block m-t-xs font-bold" id="fullname"></span>
            
            <!-- Placeholder role (admin or employee) -->
            <span class="text-muted text-xs block">Administrador <b class="caret"></b></span>
            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <li><a class="dropdown-item" href="index-2.php">Información personal</a></li>
            <li class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../Login/index.php">Salir</a></li>
            </ul>
            </div> <!-- div from dropdown -->
            
            <div class="logo-element">P</div>
            </li>
            <li class="active">
            <a href="index-2.php"><i class="fa fa-address-book-o"></i> <span class="nav-label">Ajustes de usuario</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
            <li><a href="index-2.php">Gestión de perfil</a></li>
            <li class="active"><a href="dashboard_2.php">Gestión de usuarios</a></li>
        </ul>
    </li>
    <li>

    <a href="providers.php"><i class="fa fa-users"></i> <span class="nav-label">Proveedores</span></a>
    </ul>

    </div> <!-- div from sidebar collapse -->
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
    </div> <!-- div from navbar header -->
    <ul class="nav navbar-top-links navbar-right">
    <li style="padding: 20px">
    <span class="m-r-sm text-muted welcome-message">Bienvenido a Proveneet</span>
    </li>
    <li>
    <a href="index.php">
    <i class="fa fa-question-circle-o"></i> Ayuda</a>
    </li>
    <li>
    <a href="../Login/index.php">
    <i class="fa fa-sign-out"></i> Salir</a>
    </li>
    </ul>
    </nav>
    </div> <!-- div from row border bottom -->


    <div class="ibox ">
    <div class="ibox-title">
    <h5>Usuarios registrados</h5>
    <div class="ibox-tools">
    <a class="collapse-link" href="#">
    <i class="fa fa-chevron-up"></i>
    </a>
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <i class="fa fa-wrench"></i>
    </a>
    </div><!-- div from ibox-tools -->
    </div><!-- div from ibox-title -->


    <!-- TABLE -->
    <div class="ibox-content no-padding">
    <ul class="list-group">
    
    <div class="table-responsive">
    <table class="table table-bordered table-hover dataTables-example" id="users">
    <thead>
    <tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Nombre de usuario</th>
    <th>Contraseña</th>
    <th>Correo electrónico</th>
    <th>Permisos</th>
    </tr>
    </thead>
    
    <tbody>
    <?php while($row1 = mysqli_fetch_array($result3)):;?>
            <tr>
                <td><?php echo $row1[0];?></td>
                <td><?php echo $row1[1];?></td>
                <td><?php echo $row1[2];?></td>
                <td><?php echo $row1[3];?></td>
                <td><?php echo $row1[4];?></td>
                <td><?php echo $row1[5];?></td>
            </tr>
            <?php endwhile; mysqli_close($conn);?>  
    </tfoot>
    </table>
    </div>


    <!-- BUTTONS-->

        <div class="d-flex flex-row-reverse bd-highlight">
        <div class="col-xs-2 p-1 bd-highlight">
        <button class="btn btn-primary btn-lg" id="delete" disabled="disable">Eliminar</button>
        </div>

        <div class="col-xs-2 p-1 bd-highlight">
        <button class="btn btn-primary btn-lg" id="modify" disabled="disable">Modificar</button>
        </div>

        <div class="col-xs-2 p-1 bd-highlight">
        <a data-toggle="modal" class="btn btn-primary btn-lg" href="#add-user">Agregar</a>
        </div>
        </div>

    <!-- FORM REGISTER -->
        <div id="add-user" class="modal fade" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-body">
        <div class="row">
        <div class="col-sm-12"><h3 class="m-t-none m-b">Registrar nuevo usuario</h3>
        <form role="form">
        <div class="form-group"><label>Nombre de usuario</label> <input type="text" placeholder="Nombre de usuario" class="form-control" id="user"></div>
        <div class="form-group"><label>Contraseña</label> <input type="password" placeholder="Contraseña" class="form-control" id="pass"></div>
        <div class="form-group"><label>Confirmar contraseña</label> <input type="password" placeholder="Confirmar contraseña" class="form-control" id="conpw"></div>
        <div class="form-group"><label>Correo electrónico</label> <input type="email" placeholder="E-mail" class="form-control" id="email"></div>
        <div class="form-group"><label>Nombre</label> <input type="text" placeholder="Nombre" class="form-control" id="name"></div>
        <div class="form-group"><label>Apellido</label> <input type="text" placeholder="Apellido" class="form-control" id="ln"></div>
        <div class="form-group"><label>Permisos</label></div>
        <div><label> <input type="radio" value="Administrador" id="r3" name="radio2"> <i></i> Administrador </label></div>
        <div><label> <input type="radio" value="Empleado" id="r4" name="radio2"> <i></i> Empleado </label></div>

        <!-- SUBMIT -->
        <button class="btn btn-primary btn-lg float-right ml-2">Cancelar</button>
        <button class="btn btn-primary btn-lg float-right" type="submit" id="addusr">Registrar</button>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>

    <!-- FORM MODIFY -->
    <div id="modify-user" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-body">
    <div class="row">
    <div class="col-sm-12"><h3 class="m-t-none m-b">Modificar usuario</h3>
    <form role="form">
    <div class="form-group"><label>Nombre de usuario</label> <input type="text" placeholder="Nombre de usuario" class="form-control" value="" id="musername"></div>
    <div class="form-group"><label>Contraseña</label> <input type="password" placeholder="Contraseña" class="form-control" value="" id="mpw"></div>
    <div class="form-group"><label>Confirmar contraseña</label> <input type="password" placeholder="Confirmar contraseña" class="form-control" value="" id="cmpw"></div>
    <div class="form-group"><label>Correo electrónico</label> <input type="email" placeholder="E-mail" class="form-control" value="" id="memail"></div>
    <div class="form-group"><label>Nombre</label> <input type="text" placeholder="Nombre" class="form-control" value="" id="mname"></div>
    <div class="form-group"><label>Apellido</label> <input type="text" placeholder="Apellido" class="form-control" value="" id="nln"> </div>
    <div class="form-group"><label>Permisos</label></div>
    <div class="i-checks"><label> <input type="radio" id="r1" value="Administrador" name="radio1"> <i></i> Administrador </label></div>
    <div class="i-checks"><label> <input type="radio" id="r2" value="Empleado" name="radio1"> <i></i> Empleado </label></div>

    <!-- SUBMIT -->
    <button class="btn btn-primary btn-lg float-right ml-2">Cancelar</button>
    <button class="btn btn-primary btn-lg float-right" type="submit" id="submitmod">Aceptar</button>

    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>

    </ul>
    </div><!-- ibox content-->
    </div><!-- div from ibox -->


    </div><!-- div from page wrapper -->
    </div><!-- div from wrapper(superior) -->


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
    $(document).ready(function(){
    $('.dataTables-example').DataTable({
    pageLength: 10,
    responsive: true,
    dom: '<"html5buttons"B>lTfgitp',
    buttons: [        
        {
        customize: function (win){
        $(win.document.body).addClass('white-bg');
        $(win.document.body).css('font-size', '10px');
        
        $(win.document.body).find('table')
        .addClass('compact')
        .css('font-size', 'inherit');
        }
        }
        ]
    });    
     });
        
    </script>


<script>
    $('#addusr').click(function(event){ 
    var user = document.getElementById("user").value;
    var password = document.getElementById("pass").value;
    var password2 = document.getElementById("conpw").value;
    var name = document.getElementById("name").value;
    var ln = document.getElementById("ln").value;
    var email = document.getElementById("email").value;
    var permissions = null;
    var flag = true;

        //Validations of user var.
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

    //Validations of password var.
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

    //Validations of ln var.
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
      

    //Validations of email var.
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


    var allM = [];
    var table = document.getElementById("users");
    for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   for (var j = 0, col; col = row.cells[j]; j++) {
       if (j == 4){
           allM.push(col.innerHTML);
    /*Get all emails*/
       }
     //iterate through columns
     //columns would be accessed using the "col" variable assigned in the for loop
   }  
}

    for(var i = 0; i < allM.length; i++){
        if (email == allM[i]){
            alert("Correo electrónico está asociado a una cuenta ya existente");
            next = false;
            break;
            flag = 0;
        }
    }

    if (flag != 0){
    $.ajax({
        type:"POST",
        url:"adduser.php",
        async: false,
        data: {user:user,password:password,name:name,ln:ln,email:email,permissions:permissions},
        success: function(data){
        alert(data);
            //window.location = '../Main/index.html';
        }
        });
    }
        });
        </script>


    <script type="text/javascript">
    /*Fetch values from login*/
    var ln = <?php echo json_encode($value2); ?>;
    var n = <?php echo json_encode($value); ?>;

    /*Assign login data*/
    document.getElementById("fullname").innerHTML = n[0]+" "+ln[0];

    </script>


    <script type="text/javascript">
    /*Get selected row*/
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
                    $('#modify-user').modal()
                    $('#modify-user').on('shown.bs.modal', function () {
                      $('#modify-user').trigger('focus')
                    })
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

                /*Gather modified values*/
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
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   for (var j = 0, col; col = row.cells[j]; j++) {
       if (j == 4){
           allM.push(col.innerHTML);
    /*Get all emails*/
       }
     //iterate through columns
     //columns would be accessed using the "col" variable assigned in the for loop
   }  
}

    for(var i = 0; i < allM.length; i++){
        if (newe == allM[i]){
            alert("Correo electrónico está asociado a una cuenta ya existente");
            next = false;
            break;
            flag = 0;
        }
    }

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

    //Validations of password var.
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

    //Validations of ln var.
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
      

    //Validations of email var.
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
        url:"moduser.php",
        async: false,
        data: {user:user,password:password,name:name,ln:ln,newe:newe,permissions:permissions,email:email},
        success: function(data){
        alert(data);
            //window.location = '../Main/index.html';
        }
        });
    }
        }); //End of submit modify user

        $('#delete').click(function(event){            
            var filter = <?php echo json_encode($value3); ?>;
            var flag = 1;
            if (filter[0] == email && flag){
                alert("No puedes eliminarte a tí mismo!");
                flag = 0;
            }
        if (flag){
        $.ajax({
        type:"POST",
        url:"deluser.php",
        async: false,
        data: {email:email},
        success: function(data){
        alert(data);
            window.location = 'dashboard_2.php';
        }
        });
        }
        }); //End of submit modify user

            });
        });
    </script>
    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.8/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Aug 2018 01:28:16 GMT -->
    </html>
