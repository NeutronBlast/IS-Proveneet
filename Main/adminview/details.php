<?php
    require ('..\util\isLoggedAdm.php');
    require ('..\dbProd\fillDetails.php');

?>

<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.8/ecommerce_product_detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Aug 2018 01:35:29 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Proveneet</title>
    <!-- Icon -->
    <link rel="icon" type="image/png" href="../img/logo.png" />

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../css/plugins/slick/slick.css" rel="stylesheet">
    <link href="../css/plugins/slick/slick-theme.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="../css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">


</head>

<body>

<div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <!-- Image (always default) -->

                            <img alt="image" class="rounded-circle" src="../img/pfp_small.jpg" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <!-- Placeholder name and last name -->

                                <span class="block m-t-xs font-bold" id="fullname"></span>

                                <!-- Placeholder role (admin or employee) -->
                                <span class="text-muted text-xs block">Administrador <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.php">Información personal</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../util/logout.php">Salir</a></li>
                            </ul>
                        </div> <!-- div from dropdown -->

                        <div class="logo-element">P</div>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-address-book-o"></i> <span class="nav-label">Ajustes de
                                usuario</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="profile.php">Gestión de perfil</a></li>
                            <li><a href="manageusers.php">Gestión de usuarios</a></li>
                        </ul>
                    </li>
                    <li>

                        <a href="providers.php"><i class="fa fa-users"></i> <span
                                class="nav-label">Proveedores</span></a>
                    </li>
                    <li>
                        <a href="manageproducts.php"><i class="fa fa-dropbox"></i> <span
                                class="nav-label">Gestión de productos</span></a>
                        </li>

                    <li class="active">
                    <a href="catalog.php"><i class="fa fa-shopping-cart"></i> <span
                                class="nav-label">Realizar compra</span></a>
                    </li>
                    <li>
                        <a href="pendingorders.php"><i class="fa fa-shopping-bag"></i> <span class="nav-label">Gestión de ordenes de compra</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="pendingorders.php">Pendientes</a></li>
                            <li><a href="processedorders.php">Procesadas</a></li>
                        </ul>
                    </li>
                </ul>

            </div> <!-- div from sidebar collapse -->
            </nav>

            <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
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
                            <a href="../util/logout.php">
                                <i class="fa fa-sign-out"></i> Salir</a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- div from row border bottom -->

    
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Detalles de producto</h5>
                </div><!-- div from ibox-title -->

            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-5">


                                    <div class="product-images">

                                        <div>
                                            <div class="image-imitation">
                                                [NO HAY IMÁGEN DISPONIBLE]
                                            </div>
                                        </div>
                                        


                                    </div>

                                </div>  
                                <div class="col-md-7">

                                    <h2 class="font-bold m-b-xs" id="prodname">
                                        
                                    </h2>
                                    <div class="m-t-md">
                                        <h2 class="product-main-price" id="dprice"></h2>
                                    </div>
                                    <hr>

                                    <dl class="m-t-md">
                                        <dt>Proveedor</dt>
                                        <dd id ="provider"></dd>
                                        <dt>Código</dt>
                                        <dd id ="thecode"></dd>
                                        <dt>Categoría</dt>
                                        <dd id="thecat"></dd>
                                    </dl>
                                    <hr>

                                    <div>
                                        <div class="btn-group">
                                            <a data-toggle="modal" id="createOC" class="btn btn-primary btn-lg" href="#oc"><i class="fa fa-cart-plus"></i> Generar orden de compra</a>
                                        </div>
                                    </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>    


<!-- FORM ADD -->
<div id="oc" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <h3 class="m-t-none m-b">Generar orden de compra</h3>
                                            <form role="form" id="preOC">
                                                <div class="form row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>ID orden de compra #</label> 
                                                                <input type="text" class="form-control" id="OCcode" disabled="disable">
                                                        </div>
                                                    </div>
                                                        
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nombre del producto</label> 
                                                                <input type="text" placeholder="Nombre del producto" class="form-control" id="prodname2" disabled="disable">
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="form row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Precio</label> 
                                                                <input type="text" placeholder="Precio" class="form-control" id="price" disabled="disable">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Proveedor</label> 
                                                                <input type="text" placeholder="Proveedor" class="form-control" id="prov" disabled="disable">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Solicitante</label> 
                                                                <input type="text" placeholder="" class="form-control" id="owner" disabled="disable">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Fecha de emisión</label> 
                                                                <input type="text" class="form-control" id="date" disabled="disable">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Cantidad</label> 
                                                                <input type="text" class="form-control" id="quantity">
                                                            </div>
                                                        </div>
                                                        </div>
                                                    <div>                                               
                                                        <!-- SUBMIT -->
                                                        <button class="btn btn-primary btn-lg float-right ml-2">Cancelar</button>
                                                        <button class="btn btn-primary btn-lg float-right" type="button" id="submitprod">Agregar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>


    <!-- Mainly scripts -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="../js/plugins/dataTables/datatables.min.js"></script>
    <script src="../js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <!-- Flot -->
    <script src="../js/plugins/flot/jquery.flot.js"></script>
    <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="../js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="../js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="../js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="../js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="../js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="../js/plugins/toastr/toastr.min.js"></script>

    <!-- Utilities -->
    <script src="../util/datatable.js"></script>

    <!-- slick carousel-->
    <script src="../js/plugins/slick/slick.min.js"></script>

    <!-- Login data -->
    <script type="text/javascript">
    /*Fetch values from login*/
    var ln = <?php echo json_encode($value2); ?>;
    var n = <?php echo json_encode($value); ?>;
    /*Assign login data*/
    document.getElementById("fullname").innerHTML = n[0] + " " + ln[0];

    /*Fetch values from details*/
    var na = <?php echo json_encode($name); ?>;
    var code = <?php echo json_encode($code); ?>;
    var price = <?php echo json_encode($valuep3); ?>;
    var cat = <?php echo json_encode($valuep2); ?>;
    var prov = <?php echo json_encode($valuep); ?>;

    /*Assign*/
    document.getElementById("prodname").innerHTML = na;
    document.getElementById("dprice").innerHTML = 'BsS'+' '+price[0] ;
    document.getElementById("provider").innerHTML = prov[0];
    document.getElementById("thecode").innerHTML = code;
    document.getElementById("thecat").innerHTML = cat[0];
    document.getElementById("owner").value = n[0] + " " + ln[0];
    document.getElementById("prodname2").value = na;
    document.getElementById("price").value = price[0];
    document.getElementById("prov").value = prov[0];

    </script>

    <!-- Utilities -->
    <script src="../dbOC/addOCverif.js"></script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.8/ecommerce_product_detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Aug 2018 01:35:31 GMT -->
</html>
