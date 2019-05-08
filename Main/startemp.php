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
mysqli_close($conn);
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
    
    <span class="block m-t-xs font-bold">Thomas Hesse</span>
    
    <!-- Placeholder role (admin or employee) -->
    <span class="text-muted text-xs block">Empleado <b class="caret"></b></span>
    </a>
    <ul class="dropdown-menu animated fadeInRight m-t-xs">
    <li><a class="dropdown-item" href="index-2.html">Información personal</a></li>
    <li class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="../Login/index.php">Salir</a></li>
    </ul>
    </div> <!-- div from dropdown -->
    
    <div class="logo-element">P</div>
    </li>
    <li class="active">
    <a href="profemp.html"><i class="fa fa-users"></i> <span class="nav-label">Gestión de perfil</span></a>
    </li>
        
    <li>
    <a href="providersemp.html"><i class="fa fa-users"></i> <span class="nav-label">Proveedores</span></a>
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


    <div class="ibox-content no-padding">
    <ul class="list-group">

    <!-- FAQ TITLE -->
    <div class="container">
    <div class="row m-b-lg">
    <div class="col-lg-12 text-center">
    <div class="navy-line"></div>
    <h1>Bienvenido</h1>
    <p>En ésta sección podrá obtener una guía rápida acerca de Proveneet. Haga clic sobre cada pregunta para visualizar la respuesta</p>
    </div> <!-- div from col lg-12 -->
    </div> <!-- div from navy line -->

   <!-- ITEMS -->
    <div class="faq-item">
    <div class="row">
    <div class="col-md-7">
    <a data-toggle="collapse" href="#faq1" class="faq-question">¿Qué es Proveneet?</a>
    <small>Tipo: <strong>General</strong></small>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
    <div id="faq1" class="panel-collapse collapse ">
    <div class="faq-answer">
    <p>
       Es un aplicativo que permita ubicar el proveedor con las mejores condiciones de venta,
       así como su ubicación en el mapa.
    </p>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="faq-item">
    <div class="row">
    <div class="col-md-7">
    <a data-toggle="collapse" href="#faq3" class="faq-question">¿Cómo agrego un nuevo proveedor?</a>
    <small>Tipo: <strong>Funciones</strong></small>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
    <div id="faq3" class="panel-collapse collapse ">
    <div class="faq-answer">
    <p>
        Diríjase a "Proveedores" en el menú de la izquierda, cliqueelo y en la
        parte inferior de la tabla de proveedores presione "agregar" y rellene los datos correspondientes.
    </p>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="faq-item">
    <div class="row">
    <div class="col-md-7">
    <a data-toggle="collapse" href="#faq4" class="faq-question">¿Cómo modifico mi contraseña?</a>
    <small>Tipo: <strong>Funciones</strong></small>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
    <div id="faq4" class="panel-collapse collapse ">
    <div class="faq-answer">
    <p>
        Dirigéndose a "Ajustes de usuario" en el menú de la izquierda, seleccionando
        "Gestión de perfil" en el menú desplegable y cliqueando el botón de "cambiar contraseña"
            </p>
            </div>
            </div>
            </div>
            </div>
            </div>
        
    
    <!-- FOOTER -->
    <div class="row">
    <div class="col-lg-12 text-center m-t-lg m-b-lg">
    <p><strong>&copy; 2019 Provennet</strong></p>
    </div> <!-- div from row -->
    </div> <!-- div from col-lg-12 -->
    </div> <!-- div from row m-b -->
    </div> <!-- div from container -->

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

    /*Assign login data*/
    document.getElementById("fullname").innerHTML = n[0]+" "+ln[0];

    </script>
	
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.8/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Aug 2018 01:28:16 GMT -->
</html>