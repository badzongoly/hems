<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/01/2018
 * Time: 06:13 PM
 */
require_once('../../classes/mysql.class.php');
$page = "settings";
$sub_page_name = "assign_programme";
$pull_ucat = new MySQL();
$pull_ucat->checkLogin();
$pull_ucat->Query("SELECT * FROM implementing_partners WHERE status= 'Active'");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:56:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>HEMS | ASSIGN PROGRAMME TO PARTNER</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="../../assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../../assets/css/animate.min.css" rel="stylesheet" />
    <link href="../../assets/css/style.min.css" rel="stylesheet" />
    <link href="../../assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="../../assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <link href="../../assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
    <link href="../../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="../../assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <?php include('../inc/header.php');?>
    <!-- end #header -->

    <!-- begin #sidebar -->
    <?php include('../inc/menu.php');?>
    <!-- end #sidebar -->

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Settings</a></li>
            <li class="active">Assign Programme to Partner</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Settings <small>assign programme to partner...</small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-md-12 col-xs-6">
                <!-- begin panel -->
                <div class="panel panel-primary" data-sortable-id="form-stuff-1">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Assign Programme to Partner</h4>
                    </div>
                    <div class="panel-body">


                        <div id="uclisted">
                            <table id="data-table" class="table table-striped table-bordered"  style="width: 80%;" align="center">
                                <thead>
                                <tr>
                                    <th> Name</th>
                                    <th>Contact Person</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while(!$pull_ucat->EndOfSeek()){ $ucrow = $pull_ucat->Row();?>
                                    <tr>
                                        <td><?php echo $ucrow->name;?></td>
                                        <td><?php echo $ucrow->contact_person;?></td>
                                        <td><?php echo $ucrow->phone;?></td>
                                        <td><?php echo $ucrow->email;?></td>
                                        <td><?php echo $ucrow->location;?></td>
                                        <td><a href="#" id="assign" data-id="<?php echo $ucrow->id;?>" class="btn btn-primary">Assign Programme</a> </td>
                                        <td><a href="#" id="assigned_programmes" data-id="<?php echo $ucrow->id;?>" class="btn btn-success"> View Assigned Programme</a> </td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-12 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end #content -->

    <!-- #modal-dialog -->
    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Modal Dialog</h4>
                </div>
                <div class="modal-body">
                    Modal body content here...
                </div>
            </div>
        </div>
    </div>

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="../../assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="../../assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="../../assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="../../assets/crossbrowserjs/html5shiv.js"></script>
<script src="../../assets/crossbrowserjs/respond.min.js"></script>
<script src="../../assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="../../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../../assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="../../assets/js/table-manage-default.demo.min.js"></script>
<script src="../../assets/plugins/select2/dist/js/select2.min.js"></script>
<script src="../../assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        TableManageDefault.init();
        FormPlugins.init();
    });
    $(document).on('click','#assign',function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var do_something = "fetch_form";
        $.ajax({
            type: "POST",
            url: "../../controllers/settings/settingsController.php",
            data: {id: id, do_something: do_something},
            success: function (data) {
                $("#modal-dialog").modal('toggle');
                $(".modal-title").html("View Assigned Programmes");

                    $(".modal-body").html("<br/><br/>"+data+"<br/><br/>");


            }
        });
    });
    $(document).on('click','#assigned_programmes',function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var do_something = "view assignment";
        $.ajax({
            type:"POST",
            url:"../../controllers/settings/settingsController.php",
            data:{id:id,do_something:do_something},
            success:function (data) {
                $("#modal-dialog").modal('toggle');
                $(".modal-title").html("View Assigned Programmes");
                if(data ==='no_data'){
                    $(".modal-body").html("<br/><br/><div align='center'><span class='alert alert-danger' style='text-align: center;'>Sorry no assignment(s) found.</span></div><br/><br/>");
                }else {
                    $(".modal-body").html(data+"<br/><br/><br/>");
                }

            }
        })
    });


    $(document).on('click','#save',function (e) {

        e.preventDefault();
        $("#uc_response").empty();
        var $form = $("#createUserCatForm");
            $("#save").attr("disabled", "disabled");
            $("#wait").css("display","block");
            $("html, body").animate({ scrollTop: 0 }, "slow");

            $.ajax({
                type: "POST",
                url: "../../controllers/settings/settingsController.php",
                data: $form.serialize(),
                success: function(e) {


                    if(e=="error"){


                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to make assignment.</span></div><br>").hide().fadeIn(1000);
                        $("#wait").css("display","none");
                        $("#save").removeAttr('disabled');
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to make assignment.</span></div><br>").fadeOut(6000);

                    }else if(e=="exists"){


                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>This  assignment already exists.</span></div><br>").hide().fadeIn(1000);
                        $("#wait").css("display","none");
                        $("#save").removeAttr('disabled');
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>This  assignment already exists.</span></div><br>").fadeOut(6000);

                    }else {

                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Assignment  successfully.</span></div><br>").hide().fadeIn(1000);
                        $("#wait").css("display","none");
                        $("#save").removeAttr('disabled');
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Assignment  successfully.</span></div><br>").fadeOut(6000);
                    }


                }
            });
            return false;
    });
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-53034621-1', 'auto');
    ga('send', 'pageview');
</script>
</body>

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:56:44 GMT -->
</html>

