<?php
include ("session/session.php");
include ("include/config.php");
if ($_SESSION['permission'] != 1) {
    header('location:page_403.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Winya Education</title>
        <link rel="shortcut icon" href="images/img.jpg">
        <!-- Bootstrap -->
        <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="build/css/custom.min.css" rel="stylesheet">
    </head>



    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.php" class="site_title"> <span>Winya Education</span></a>
                        </div>

                        <div class="clearfix"></div>
                        <br />

                        <!-- sidebar menu -->
                        <?php include 'sidebar.php'; ?>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                ?<?php include 'top.php'; ?>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">


                            <div class="pull-right">		   
                                <button type="button" data-toggle="modal" data-target=".bs-example-modal-form" class="btn btn-info">+ Add Admins</button> 
                            </div>


                        </div>
                        <div tabindex="-1" role="dialog" aria-labelledby="modalWithForm" class="modal fade bs-example-modal-form" id="modal">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        <h4 id="modalWithForm" class="modal-title">Add Workers</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" enctype="multipart/form-data" method="POST" name="theform" id="add_amount">



                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input name="country" id="countryname" type="text" placeholder="Enter UserName" class="form-control">
                                                <span id="error_login"></span>
                                            </div>  

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input name="password" id="password" type="password" placeholder="Enter Password" class="form-control">
                                                <span id="error_login"></span>
                                            </div> 
                                            <div class="form-group">
                                                <label for="repeat_password">Password</label>
                                                <input name="rpassword" id="rpassword" type="password" placeholder="Enter  Repeat Password" class="form-control">
                                                <span id="error_login"></span>
                                            </div>
                                            <div style="text-align:center">
                                                <span id="errors" style="color:#ff0000;"></span>
                                                <span id="success" style="color:#26B99A;"></span>
                                            </div>
                                            <div class="pull-right">

                                                <button type="button" name="submit" class="btn btn-primary proceedbutton">Save</button>
                                            </div>
                                            <div id="error_login"></div>
                                        </form>
                                    </div>



                                </div>
                            </div>
                        </div>  
                        <span id="dataresponse"></span>
                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">

                                        <h2>List Admins</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>UserName</th>
                                                    <th>User Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                $admin_query = mysqli_query($bd, "select * from admin where status='1' and permission!=1");
                                                $sno = 1;
                                                while ($fetch_admin = mysqli_fetch_array($admin_query)) {
                                                    $id = $fetch_admin['admin_id'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sno++ ?></td>
                                                        <td><?php echo $fetch_admin['user_name']; ?></td>
                                                        <td><?php
                                                            if ($fetch_admin['permission'] == 2) {
                                                                echo 'Admin';
                                                            } else {
                                                                echo 'End User';
                                                            }
                                                            ?></td>
                                                        <td>
                                                          
                                                            <button type="button" class="btn btn-danger" onclick="deleteadmin(<?php echo $id; ?>)"><i class="fa fa-trash"></i></button>
                                                        </td>

                                                    </tr>
<?php } ?>





                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
<?php include'footer.php' ?>
                <!-- /footer content -->
            </div>
        </div>


        <!-- jQuery -->
        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="vendors/nprogress/nprogress.js"></script>
        <!-- Datatables -->
        <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="vendors/datatables.net-scroller/js/datatables.scroller.min.html"></script>
        <script src="vendors/jszip/dist/jszip.min.js"></script>
        <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="js/validate_image.js"></script>
        <script type="text/javascript" src="vendors/admin/add.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="build/js/custom.min.js"></script>

        <!-- Datatables -->
        <script>
            $(document).ready(function () {
                var handleDataTableButtons = function () {
                    if ($("#datatable-buttons").length) {
                        $("#datatable-buttons").DataTable({
                            dom: "Bfrtip",
                            buttons: [
                                {
                                    extend: "copy",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "csv",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "excel",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "pdfHtml5",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "print",
                                    className: "btn-sm"
                                },
                            ],
                            responsive: true
                        });
                    }
                };

                TableManageButtons = function () {
                    "use strict";
                    return {
                        init: function () {
                            handleDataTableButtons();
                        }
                    };
                }();

                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({
                    keys: true
                });

                $('#datatable-responsive').DataTable();

                $('#datatable-scroller').DataTable({
                    ajax: "js/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });

                var table = $('#datatable-fixed-header').DataTable({
                    fixedHeader: true
                });

                TableManageButtons.init();
            });
        </script>
        <!-- /Datatables -->
    </body>

</html>