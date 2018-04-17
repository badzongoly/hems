<?php
require_once('../../classes/mysql.class.php');
$page = "spot";
$sub_page_name = "val_spotchack";
$chekLogin = new MySQL();
$chekLogin->checkLogin();

$dbConnect = new MySQL();
$dbConnect->Query("SELECT spotcheck_light.id,spotcheck_light.comment,implementing_partners.name,outcomes.name AS outcome,spotcheck_light.form_url FROM spotcheck_light 
LEFT JOIN implementing_partners ON spotcheck_light.partner_id = implementing_partners.ip_code 
LEFT JOIN outcomes ON outcomes.id = spotcheck_light.outcome_area
WHERE spotcheck_light.status = 'approved'");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:56:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>HEMS | Validate Spot Check</title>
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
    <link href="../../assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
    <link href="../../assets/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />
    <link href="../../assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="../../assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" />
    <link href="../../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="../../assets/plugins/pace/pace.min.js"></script>
    <link href="../../assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
    <link href="../../assets/plugins/jquery-confirm.min.css" rel="stylesheet"/>
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
            <li><a href="javascript:;">Spot Check</a></li>
            <li class="active">Validate Spot Check</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">SPOT CHECK <small>validate spot checks...</small></h1>
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
                        <h4 class="panel-title">Validate SPOT CHECKS</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row" id="list">

                                <table class="table table-responsive table-striped table-bordered" id="data-table">
                                    <thead>
                                    <tr>
                                        <td>Implementing Partner</td>
                                        <td>Outcome Area</td>
                                        <td>Comment</td>
                                        <td>Form</td>
                                        <td>&nbsp;</td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while(!$dbConnect->EndOfSeek()){ $pmvRow = $dbConnect->Row();?>
                                        <tr>
                                            <td><?php echo $pmvRow->name;?></td>
                                            <td><?php echo $pmvRow->outcome;?></td>
                                            <td><?php echo $pmvRow->comment;?></td>
                                            <td><a href="<?php echo $pmvRow->form_url;?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-street-view"></i> View Form</a></td>
                                            <td><a href="#"  class="btn btn-primary btn-sm" data-id="<?php echo $pmvRow->id;?>"  id="approve"><i class="fa fa-check"></i> Validate</a></td>
                                            <td><a href="#" class="btn btn-primary btn-sm" data-id="<?php echo $pmvRow->id;?>" id="decline"><i class="fa fa-times" ></i> Decline</a></td>
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

    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="modalTitle"></h4>
                </div>
                <div class="modal-body" id="modal-body">

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
<script src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="../../assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<script src="../../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="../../assets/plugins/masked-input/masked-input.min.js"></script>
<script src="../../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="../../assets/plugins/password-indicator/js/password-indicator.js"></script>
<script src="../../assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
<script src="../../assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="../../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="../../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
<script src="../../assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
<script src="../../assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="../../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../../assets/plugins/select2/dist/js/select2.min.js"></script>
<script src="../../assets/js/form-plugins.demo.min.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<script src="../../assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="../../assets/js/table-manage-default.demo.min.js"></script>
<script src="../../assets/plugins/jquery-confirm.min.js"></script>
<script src="../../assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        TableManageDefault.init();
        FormPlugins.init();
    });

    $(document).on("click","#approve",function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var action = "updateSpotCheck";
        var status = 'Validated';
        $.confirm({
            title: 'Confirm!',
            content: 'Please do you want to validate this spot check?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "POST",
                        url: "../../controllers/project/projectsController.php",
                        data:{id:id,"do":action,status:status},
                        success:function (e) {
                            if(e === 'ok'){
                                action = "fetchSpotChecks";
                                id = "approved";
                                $("#list").load("../../controllers/project/projectsController.php",{"do":action,spec:id});
                            }else{

                            }
                        }
                    })
                },
                cancel: function () {
                    $.alert('Canceled!');
                }
            }
        });
    });
    $(document).on("click","#decline",function (e) {
        var id = $(this).data('id');
        var action = "updateSpotDecline";
        var mission = 'Decline';


        $.confirm({
            title: 'Confirm!',
            content: 'Please do you want to DECLINE this spot check?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "POST",
                        url: "../../controllers/project/projectsController.php",
                        data:{id:id,"do":action,mission:mission},
                        success:function (e) {
                                $("#modalTitle").html("<lable>Reason:</lable>")
                                $("#modal-dialog").modal('toggle');
                                $("#modal-body").html(e);

                        }
                    })
                },
                cancel: function () {
                    $.alert('Canceled!');
                }
            }
        });
    });

    $(document).on('submit','#ap_dc',function(e){
        e.preventDefault();
        $("#comment_error").empty();
        var comment = $.trim($("#comment").val());

        if(comment.length == 0){
            $("#comment_error").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
        }


        if(comment.length != 0 ){

            $("#save").attr("disabled", "disabled");
            $("#wait").css("display","block");
            var form =$(this).serialize();
            $.ajax({
                type: "POST",
                url: "../../controllers/project/projectsController.php",
                data:form,
                success:function (e) {

                    if(e === 'ok'){
                        var action = "fetchSpotChecks";
                        var id = "approved";
                        $("#list").load("../../controllers/project/projectsController.php",{"do":action,spec:id});
                        $("#comment").empty();
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Project saved successfully.</span></div><br>").hide().fadeIn(1000);
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Spot check form saved successfully.</span></div><br>").fadeOut(1000);
                        $("#wait").css("display","none");
                        $("#save").removeAttr('disabled');
                        $("#modal-dialog").modal('toggle');
                    }
                    else{
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Sorry something went wrong try again.</span></div><br>").hide().fadeIn(1000);
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Sorry something went wrong try again.</span></div><br>").fadeOut(1000);

                    }

                }
            })
        }

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

