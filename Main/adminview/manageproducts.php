<?php
    require ('..\util\isLogged.php');
    require ('..\dbProd\fillProdTable.php');
    require ('..\dbProd\fillComboBoxProv.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Proveneet</title>
    <!-- Icon -->

    <link rel="icon" type="image/png" href="../img/logo.png" />

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

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
                                <span class="text-muted text-xs block">Administrador<b class="caret"></b></span>
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

                        <!-- User settings menu -->
                        <a href="profile.php"><i class="fa fa-address-book-o"></i> <span class="nav-label">Ajustes de
                                usuario</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <!-- Profile settings -->
                            <li class="active"><a href="profile.php">Gestión de perfil</a></li>

                            <!-- User admining -->
                            <li><a href="manageusers.php">Gestión de usuarios</a></li>
                        </ul>
                    </li>
                    <li>

                        <a href="providers.php"><i class="fa fa-users"></i> <span
                                class="nav-label">Proveedores</span></a>
                    </li>

                    <li class="active">
                        <a href="manageproducts.php"><i class="fa fa-dropbox"></i> <span
                                class="nav-label">Gestión de productos</span></a>
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
                    <h5>Gestionar lista de productos</h5>
                </div><!-- div from ibox-title -->

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="col-form-label" for="product_name">Buscar producto</label>
                            <input type="text" id="product_name" name="product_name" value="" placeholder="Nombre" class="form-control">
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <a data-toggle="modal" class="btn btn-primary btn-lg" id="add"
                                    href="#add-product"><i class="fa fa-plus-circle"></i> Agregar producto</a>
                            <table class="footable table table-stripped toggle-arrow-tiny dataTables-example" id="products" data-page-size="10">
                                <thead>
                                <tr>

                                    <th data-toggle="true">Nombre</th>
                                    <th data-hide="phone">Código</th>
                                    <th data-hide="phone">Precio</th>
                                    <th data-hide="phone">Categoría</th>
                                    <th data-hide="phone,tablet" >Proveedor</th>
                                    <th data-sort-ignore="true">Acción</th>

                                </tr>
                                </thead>
                                <tbody>
                                 <?php while($row1 = mysqli_fetch_array($result4)):;?>
                                    <tr>
                                        <td><?php echo $row1[0];?></td>
                                        <td><?php echo $row1[1];?></td>
                                        <td><?php echo $row1[2];?></td>
                                        <td><?php echo $row1[3];?></td>
                                        <td><?php echo $row1[4];?></td>
                                        <td>
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs" id="editprod" onclick="getSelectedRow();">Editar</button>
                                            <button class="btn-white btn btn-xs" id="delprod" onclick="getTarget();">Eliminar</button>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php endwhile; mysqli_close($conn);?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination float-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                        </div><!-- ibox content -->
                    </div><!--ibox -->
                </div><!-- col -->
            </div><!--row -->

            <!-- FORM ADD -->
                <div id="add-product" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="m-t-none m-b">Añadir nuevo producto</h3>
                                            <form role="form" id="addprod">
                                                <div class="form row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nombre de producto</label> 
                                                                <input type="text" placeholder="Nombre de producto" class="form-control" id="produname">
                                                        </div>
                                                    </div>
                                                        
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Código</label> 
                                                                <input type="text" placeholder="Código" class="form-control" id="code">
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="form row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Precio</label> 
                                                                <input type="text" placeholder="Precio" class="form-control" id="price">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Categoría</label> 
                                                                <select class="form-control" id="cat">
                                                                    <option value="Seleccionar">Seleccionar</option>
                                                                    <option>Categoría 1</option>
                                                                    <option>Categoría 2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form row">
                                                        <div class="col-sm-6">                                            
                                                            <div class="form-group">
                                                                <label>Proveedor</label>
                                                                <select class="form-control" id="provider">
                                                                    <option value="Seleccionar">Seleccionar</option>
                                                                    <?php while($row = mysqli_fetch_array($result)):;?>
                                                                    <option value="<?php echo $row['Nombre']; ?>"><?php echo $row['Nombre']; ?></option>
<?php endwhile; mysqli_close($conn);?>
                                                                </select>                                  
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


    <!-- FORM MODIFY -->
                <div id="modify-product" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="m-t-none m-b">Modificar producto</h3>
                                            <form role="form" id="modprod">
                                                <div class="form row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nombre de producto</label> 
                                                                <input type="text" placeholder="Nombre de producto" class="form-control" id="prodmod">
                                                        </div>
                                                    </div>
                                                        
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Código</label> 
                                                                <input type="text" placeholder="Código" class="form-control" id="codemod">
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="form row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Precio</label> 
                                                                <input type="text" placeholder="Precio" class="form-control" id="pricemod">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Categoría</label> 
                                                                <select class="form-control" id="catmod">
                                                                    <option>Categoría 1</option>
                                                                    <option>Categoría 2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form row">
                                                        <div class="col-sm-6">                                            
                                                            <div class="form-group">
                                                                <label>Proveedor</label>
                                                                <select class="form-control" id="provmod">
                                                                    <option value ="Seleccionar">Seleccionar</option>
                                                                    <?php while($row = mysqli_fetch_array($result2)):;?>
                                                                    <option value="<?php echo $row['Nombre']; ?>"><?php echo $row['Nombre']; ?></option>
<?php endwhile; mysqli_close($conn);?>
                                                                </select>                                    
                                                            </div>
                                                        </div> 
                                                    </div> 


                                                    <div>                                               
                                                        <!-- SUBMIT -->
                                                        <button class="btn btn-primary btn-lg float-right ml-2">Cancelar</button>
                                                        <button class="btn btn-primary btn-lg float-right" type="button" id="submitmod">Registrar</button>
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



    <!-- Mainly scripts -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

   <!-- <script src="../js/plugins/dataTables/datatables.min.js"></script>
    <script src="../js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>-->

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- FooTable -->
    <script src="../js/plugins/footable/footable.all.min.js"></script>

    <script type="text/javascript">
    /*Fetch values from login*/
    var ln = <?php echo json_encode($value2); ?>;
    var n = <?php echo json_encode($value); ?>;

    /*Assign login data*/
    document.getElementById("fullname").innerHTML = n[0]+" "+ln[0];
    </script>

    <!-- Utilities-->
    <script src="../util/datatable.js"></script>
    <script src="../dbProd/addprodverif.js"></script>
    <script src="../dbProd/modprodverif.js"></script>
    <script src="../dbProd/delprod.js"></script>


</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.8/ecommerce_product_list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Aug 2018 01:35:05 GMT -->
</html>
