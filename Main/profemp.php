<?php
	require ('util\isLogged.php');
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

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!--===============================================================================================-->
    <script src="https://www.gstatic.com/firebasejs/ui/3.6.1/firebase-ui-auth__es.js"></script>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/3.6.1/firebase-ui-auth.css" />
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <!-- Add additional services that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-functions.js"></script>
        

    <!-- Firebase -->
    <script src="js/database.js"></script>
    <script src="js/firebaseconfig.js"></script>

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
    <span class="text-muted text-xs block">Empleado <b class="caret"></b></span>
    </a>
    <ul class="dropdown-menu animated fadeInRight m-t-xs">
    <li><a class="dropdown-item" href="profemp.php">Información personal</a></li>
    <li class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="../Login/index.php">Salir</a></li>
    </ul>
    </div> <!-- div from dropdown -->
    
    <div class="logo-element">P</div>
    </li>
    <li class="active">
    <a href="profemp.php"><i class="fa fa-users"></i> <span class="nav-label">Gestión de perfil</span></a>
    </li>

    <li>
    <a href="providersemp.php"><i class="fa fa-users"></i> <span class="nav-label">Proveedores</span></a>
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
    <a href="startemp.php">
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
    <h5>Información personal</h5>
    <div class="ibox-tools">
    <a class="collapse-link" href="#">
    <i class="fa fa-chevron-up"></i>
    </a>
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <i class="fa fa-wrench"></i>
    </a>
    </div><!-- div from ibox-tools -->
    </div><!-- div from ibox-title -->

    <!-- PROFILE -->

    <div class="ibox-content no-padding">
    <ul class="list-group">
    <div class="ibox-content no-padding border-left-right text-center">

    <!-- Cosmetic picture -->
    <img alt="image" class="img-fluid rounded" src="img/profile_med.png">
    </div>
    <div class="ibox-content profile-content text-center">

    <!-- Placeholder name and last name -->
    <h4 id="fullname2"><strong></strong></h4>
    <!-- Placeholder e-mail adress -->
    <i class="fa fa-envelope"></i> <p id="email"></p>
    <p><i class="fa fa-user-o"></i> Empleado</p>

    <!-- Modify password button -->
    <div class="user-button">
    <div class="d-flex flex-row-reverse bd-highlight justify-content-center">
    <div class="col-md-6 p-1 bd-highlight justify-content-center">
    <a data-toggle="modal" class="btn btn-primary btn-lg" href="#change-password"><i class="fa fa-lock"></i>    Cambiar Contraseña</a>
    </div>
    </div>
    </div>
    </div>

    <!-- Modify password form -->
    <div id="change-password" class="modal fade" aria-hidden="true">
    <div class="modal-dialog modal-md">
    <div class="modal-content">
    <div class="modal-body">
    <div class="row">
    <div class="col-sm-12"><h3 class="m-t-none m-b">Modificar contraseña</h3>
    <form role="form">
    <div class="form-group"><label>Contraseña</label> <input type="password" placeholder="Contraseña" class="form-control" id="pw"></div>
    <div class="form-group"><label>Confirmar contraseña</label> <input type="password" placeholder="Confirmar contraseña" class="form-control" id="conpw"></div>
        
    <!-- SUBMIT -->
    <button class="btn btn-primary btn-lg float-right ml-2">Cancelar</button>
    <button class="btn btn-primary btn-lg float-right" type="submit" id="submitbttn">Aceptar</button>
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


    <script type="text/javascript">
    /*Fetch values from login*/
    var ln = <?php echo json_encode($value2); ?>;
    var n = <?php echo json_encode($value); ?>;
    var e = <?php echo json_encode($user); ?>;
    var p = <?php echo json_encode($pass); ?>;

    /*Assign login data*/
    document.getElementById("fullname").innerHTML = n[0]+" "+ln[0];
    document.getElementById("fullname2").innerHTML = n[0]+" "+ln[0];
    document.getElementById("email").innerHTML = e;

    /*Modify password*/
    $('#submitbttn').click(function(event){ 
        var newp = document.getElementById("pw").value;
        var cnewp = document.getElementById("conpw").value;
        var next = true;

        if (newp != cnewp){
            alert("Contraseña y confirmar contraseña no coinciden");
            next = false;
        }

        if (next){
        $.ajax({
        type:"POST",
        url:"changepw.php",
        async: false,
        data: {e:e,newp:newp},
        success: function(data){
            window.location.href='profemp.php';
        }
        });
        }

    });

    
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.8/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Aug 2018 01:28:16 GMT -->
</html>
