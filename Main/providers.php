<?php
	require ('db\fillProvidersTable.php');
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
    <li>
    <a href="index-2.php"><i class="fa fa-address-book-o"></i> <span class="nav-label">Ajustes de usuario</span> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
    <li><a href="index-2.php">Gestión de perfil</a></li>
    <li><a href="dashboard_2.php">Gestión de usuarios</a></li>   
    </ul>                
    </li>
    <li class="active">
    <a href="providers.php"><i class="fa fa-users"></i> <span class="nav-label">Proveedores</span></a>
    </li>
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
<a href="index.html">
<i class="fa fa-question-circle-o"></i> Ayuda</a>
</li>
<li>
<a href="../Login/index.php">
<i class="fa fa-sign-out"></i> Salir</a>
</li>
</ul>
</nav>
</div> <!-- div from row border bottom -->

<!-- TABLE -->
<div class="ibox ">
<div class="ibox-title">
        <h5>Proveedores</h5>
        <div class="ibox-tools">
        <a class="collapse-link" href="#">
        <i class="fa fa-chevron-up"></i>
        </a>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-wrench"></i>
        </a>
        </div><!-- div from ibox-tools -->
        </div><!-- div from ibox-title -->
        
        <div class="ibox-content no-padding">
        <ul class="list-group">
        <div class="table-responsive">
        <table class="table table-bordered table-hover dataTables-example" id="providers" >
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>RIF</th>
            </tr>
            </thead>
                        
            <tbody>
            <?php while($row1 = mysqli_fetch_array($result3)):;?>
            <tr>
                <td><?php echo $row1[0];?></td>
                <td><?php echo $row1[1];?></td>
                <td><?php echo $row1[2];?></td>
                <td><?php echo $row1[3];?></td>
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
    <a data-toggle="modal" class="btn btn-primary btn-lg" href="#add-provider">Agregar</a>
    </div>
    </div>

    <!-- FORM ADD -->
    <div id="add-provider" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-body">
    <div class="row">
    <div class="col-sm-12"><h3 class="m-t-none m-b">Agregar nuevo proveedor</h3>
    <form role="form">
    <div class="form-group"><label>Nombre</label> <input type="text" placeholder="Nombre" class="form-control" id="name"></div>
    <div class="form-group"><label>Dirección</label> <input type="text" placeholder="Dirección" class="form-control" id="dir"></div>
    <div class="form-group"><label>Teléfono</label> <input type="text" placeholder="Teléfono" class="form-control" id="phone"></div>
    <div class="form-group"><label>RIF</label> <input type="text" placeholder="RIF" class="form-control" id="rif"></div>
    
    <!-- SUBMIT -->
    <button class="btn btn-primary btn-lg float-right ml-2">Cancelar</button>
    <button class="btn btn-primary btn-lg float-right" type="submit" id="addpro">Aceptar</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <!-- FORM MODIFY -->
    <div id="modify-provider" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-body">
    <div class="row">
    <div class="col-sm-12"><h3 class="m-t-none m-b">Modificar proveedor</h3>
    <form role="form">
    <div class="form-group"><label>Nombre</label> <input type="text" placeholder="Nombre" class="form-control" id="mname"></div>
    <div class="form-group"><label>Dirección</label> <input type="text" placeholder="Dirección" class="form-control" id="mdir"></div>
    <div class="form-group"><label>Teléfono</label> <input type="text" placeholder="Teléfono" class="form-control" id="mphone"></div>
    <div class="form-group"><label>RIF</label> <input type="text" placeholder="RIF" class="form-control" id="mrif"></div>
    
    <!-- SUBMIT -->
    <button class="btn btn-primary btn-lg float-right ml-2">Cancelar</button>
    <button class="btn btn-primary btn-lg float-right" type="submit" id="modifyprov">Aceptar</button>

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
</body>

<!-- Page-Level Scripts -->
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
    }
    }
        ]
        });    
        });
               
</script>

<script>
    /*Add provider*/
    $('#addpro').click(function(event){ 
    var next = true;
    var name = document.getElementById("name").value;
    var dir = document.getElementById("dir").value;
    var phone = document.getElementById("phone").value;
    var rif = document.getElementById("rif").value;


    /*Verify before sending to AJAX*/
    
    next = true;
    /*Cannot be blank*/
    if (document.getElementById("name").value == "" || document.getElementById("dir").value=="" ||
    document.getElementById("phone").value == "" || document.getElementById("rif").value ==""){
        next = false;
        alert("Por favor rellene todos los datos antes de continuar");
    }

        /*Provider must be unique in the system*/
    var rifs = [];
    var table = document.getElementById("providers");
    for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   for (var j = 0, col; col = row.cells[j]; j++) {
       if (j == 3){
           rifs.push(col.innerHTML);
    /*Get all rifs*/
       }
     //iterate through columns
     //columns would be accessed using the "col" variable assigned in the for loop
   }  
}

    for(var i = 0; i < rifs.length; i++){
        if (rif == rifs[i]){
            alert("Proveedor con RIF ingresado ya existe en el sistema");
            next = false;
            break;
        }
    }

    /*RIF*/
    var patt = new RegExp(/^([J-]+[0-9])/i);
    next = patt.test((String)(rif));

    if (!next){
        alert("Formato de RIF inválido: Debe ser J-numeros");
    }

    if (next){
    $.ajax({
        type:"POST",
        url:"addprovider.php",
        async: false,
        data: {name:name,dir:dir,phone:phone,rif:rif},
        success: function(data){
        alert(data);
            //window.location = '../Main/index.html';
        }
        });
    } // if next
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
            var tr = $('#providers').find('tr');
            var name = null;
                var dir = null;
                var phone = null;
                var rif = null;
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

                            dir = values.slice(start+1,end);
                            values = "";
                        }

                        
                        else if (index == 2){
                            start = values.indexOf(":");
                            end = values.indexOf("<");

                            phone = values.slice(start+1,end);
                            values = "";
                        }

                        else if (index == 3){
                            start = values.indexOf(":");
                            end = values.indexOf("<");

                            rif = values.slice(start+1,end);
                            values = "";
                        }
                });
            
                $('#modify').click(function(event){
                    $('#modify-provider').modal()
                    $('#modify-provider').on('shown.bs.modal', function () {
                      $('#modify-provider').trigger('focus')
                    })
                    /*Replace placeholders with gathered values, ready to modify*/
                    document.getElementById("mname").value = name;
                    document.getElementById("mdir").value = dir;
                    document.getElementById("mphone").value = phone;
                    document.getElementById("mrif").value = rif;

                /*Gather modified values*/
                });

                $('#modifyprov').click(function(event){ 
                var name = document.getElementById("mname").value;
                var dir = document.getElementById("mdir").value;
                var phone = document.getElementById("mphone").value;
                var nextrif = document.getElementById("mrif").value;
/*After all info is correct we send to ajax to insert to database*/
if (document.getElementById("mname").value == "" || document.getElementById("mdir").value=="" ||
    document.getElementById("mphone").value == "" || document.getElementById("mrif").value ==""){
        next = false;
        alert("Por favor rellene todos los datos antes de continuar");
    }

        /*Provider must be unique in the system*/
    var rifs = [];
    var table = document.getElementById("providers");
    for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   for (var j = 0, col; col = row.cells[j]; j++) {
       if (j == 3){
           rifs.push(col.innerHTML);
    /*Get all rifs*/
       }
     //iterate through columns
     //columns would be accessed using the "col" variable assigned in the for loop
   }  
}
var cont = 0;
    for(var i = 0; i < rifs.length; i++){
        if (nextrif == rifs[i]){
            cont++;
            if (cont == 2){
            alert("Proveedor con RIF ingresado ya existe en el sistema");
            next = false;
            break;
            }
        }
    }

    /*RIF*/
    var patt = new RegExp(/^([J-]+[0-9])/i);
    next = patt.test((String)(nextrif));

    if (!next){
        alert("Formato de RIF inválido: Debe ser J-numeros");
    }


   if (next){     
    $.ajax({
        type:"POST",
        url:"modprov.php",
        async: false,
        data: {name:name,dir:dir,phone:phone,rif:rif,nextrif:nextrif},
        success: function(data){
        alert(data);
            //window.location = '../Main/index.html';
        }
        });
   }
        }); //End of submit modify user

        $('#delete').click(function(event){
        $.ajax({
        type:"POST",
        url:"delprov.php",
        async: false,
        data: {rif:rif},
        success: function(data){
        alert(data);
            window.location = 'providers.php';
        }
        });
        }); //End of submit modify user

            });
        });
    </script>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.8/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Aug 2018 01:28:16 GMT -->
</html>
