<?php
$servername = "localhost";
$username = "root";
$password = "metalsonic21";
$dbname = "proveneet";

session_start();

$user = $_SESSION["user"];
$pass = $_SESSION["password"];

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT nombre FROM users WHERE email='$user' AND clave='$pass'"; 
$result = mysqli_query($conn, $sql);

$value = mysqli_fetch_array($result);
$sql2 = "SELECT apellido FROM users WHERE email='$user' AND clave='$pass'"; 
$result2 = mysqli_query($conn, $sql2);

$value2 = mysqli_fetch_array($result2);

/*Fill table*/
$query = "SELECT * FROM users"; 
$result3 = mysqli_query($conn, $query);
$result4 = mysqli_query($conn, $query);
$dataRow ="";
    while ($row = mysqli_fetch_array($result4)) {
        $dataRow = $dataRow."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
        <td>$row[4]</td><td>$row[5]</td></tr>";
    }
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
            
            <span class="block m-t-xs font-bold" id="fullname">Frank Hesse</span>
            
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
        <a data-toggle="modal" class="btn btn-primary btn-lg" href="#">Eliminar</a>
        </div>

        <div class="col-xs-2 p-1 bd-highlight">
        <a data-toggle="modal" class="btn btn-primary btn-lg" href="#modify-user" id="modify">Modificar</a>
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
        <div class="form-group"><label>Confirmar contraseña</label> <input type="password" placeholder="Confirmar contraseña" class="form-control"></div>
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
    <div class="form-group"><label>Nombre de usuario</label> <input type="text" placeholder="Nombre de usuario" class="form-control"></div>
    <div class="form-group"><label>Contraseña</label> <input type="password" placeholder="Contraseña" class="form-control"></div>
    <div class="form-group"><label>Confirmar contraseña</label> <input type="password" placeholder="Confirmar contraseña" class="form-control"></div>
    <div class="form-group"><label>Correo electrónico</label> <input type="email" placeholder="E-mail" class="form-control"></div>
    <div class="form-group"><label>Nombre</label> <input type="text" placeholder="Nombre" class="form-control"></div>
    <div class="form-group"><label>Apellido</label> <input type="text" placeholder="Apellido" class="form-control"></div>
    <div class="form-group"><label>Permisos</label></div>
    <div class="i-checks"><label> <input type="radio" id="r1" value="Administrador" name="radio1"> <i></i> Administrador </label></div>
    <div class="i-checks"><label> <input type="radio" id="r2" value="Empleado" name="radio1"> <i></i> Empleado </label></div>

    <!-- SUBMIT -->
    <button class="btn btn-primary btn-lg float-right ml-2">Cancelar</button>
    <button class="btn btn-primary btn-lg float-right" type="submit" id="add">Aceptar</button>

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
    var name = document.getElementById("name").value;
    var ln = document.getElementById("ln").value;
    var email = document.getElementById("email").value;
    var permissions = null;

    if (document.getElementById("r3").checked){
        permissions = document.getElementById("r3").value;
    }
    else if (document.getElementById("r4").checked){
        permissions = document.getElementById("r4").value;
    }

        
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
      $('#users').on('click', 'tbody tr', function(event) {
          alert("clic");
        $(this).addClass('highlight');
      });

      $('#modify').click(function(e) {
        var rows = getHighlightRow();
        if (rows != undefined) {
          alert(rows.attr('nombre'));
        }
      });

      var getHighlightRow = function() {
        return $('table > tbody > tr.highlight');
      }
    });
    </script>
    </body>

    <!-- Mirrored from webapplayers.com/inspinia_admin-v2.8/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Aug 2018 01:28:16 GMT -->
    </html>
