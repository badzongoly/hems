<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/01/2018
 * Time: 06:13 PM
 */
require_once('../../classes/projects.class.php');
$page = "spot";
$sub_page_name = "view_import";
$pull_ucat = new Project();
$pull_ucat->checkLogin();
//$pull_ucat->Query("SELECT * FROM implementing_partners WHERE status= 'Active'");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:56:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>HEMS | ADD EXCEL PMV</title>
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
    <link href="../../assets/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
    <link href="../../assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
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
            <li><a href="javascript:;">SPOT CHECK</a></li>
            <li class="active">SPOT CHECK Excel Upload</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">SPOT CHECK <small>view spot check excel upload...</small></h1>
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
                        <h4 class="panel-title">VIEW SPOT CHECK Excel Upload</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                        <div class="container-fluid">
                            <?php echo $pull_ucat->getConfirmationSPOTCHECK() ?>
                        </div>
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
<script src="../../assets/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<script src="../../assets/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<script src="../../assets/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
<script src="../../assets/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
<script src="../../assets/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
<script src="../../assets/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
<script src="../../assets/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../../assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        FormPlugins.init();
        FormMultipleUpload.init();
    });
</script>
<script>

    $(document).on('click','#save',function (e) {
        e.preventDefault();
        $("#activity_error").empty();

        var file = $.trim($("#files").val());

        if(file.length == 0){
            $("#activity_error").html('<p><small style="color:red;">Please select a file to upload </small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }

        if( file.length != 0){
            var formdata = new FormData;
            formdata.append('file',$('#files')[0].files[0]);
            formdata.append('month',$("#month").val());
            formdata.append('year',$("#year").val());
            formdata.append('do',$('#do').val());
            $("#save").attr("disabled", "disabled");
            $("#wait").css("display","block");
            $("html, body").animate({ scrollTop: 0 }, "slow");

            $.ajax({
                type: "POST",
                url: "../../controllers/project/projectsController.php",
                processData: false,
                contentType: false,
                data: formdata,
                success: function(e) {
                    if(e=="error"){

                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to save PMV.</span></div><br>").hide().fadeIn(1000);
                        $("#wait").css("display","none");
                        $("#save").removeAttr('disabled');
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to save PMV.</span></div><br>").fadeOut(6000);

                    }else if(e=="exists"){


                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>This PMV already exists.</span></div><br>").hide().fadeIn(1000);
                        $("#wait").css("display","none");
                        $("#save").removeAttr('disabled');
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>This PMV already exists.</span></div><br>").fadeOut(6000);

                    }
                    else if(e ==="success"){
                        $("#wait").css("display","none");
                        $("#save").removeAttr('disabled');
                        $('#uclisted').empty();
                        $('#uclisted').load("../../controllers/project/projectsController.php",{'do':"getNewList"});
                        $('#files').val();
                    }
                    else {

                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>PMV saved successfully.</span></div><br>").hide().fadeIn(1000);
                        $('#uclisted').empty();
                        $('#uclisted').html(e);
                        $("#wait").css("display","none");
                        $("#save").removeAttr('disabled');
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>PMV saved successfully.</span></div><br>").fadeOut(6000);
                    }


                }
            });
            return false;
        }
    });

        $(document).on('click', '#delete', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var action = "delete";
            $.ajax({
                type: "POST",
                data: {id: id, do_action: action},
                url: "../../controllers/project/projectsController.php",
                success: function (data) {
                    if (data == "error") {
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to delete PMV.</span></div><br>").hide().fadeIn(1000);
                        $("#wait").css("display", "none");
                        $("#save").removeAttr('disabled');


                    } else {

                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>PMV deleted successfully.</span></div><br>").hide().fadeIn(1000);

                        $('#uclisted').html(data);
                        $("#wait").css("display", "none");
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>PMV deleted successfully.</span></div><br>").fadeOut(6000);

                    }

                }

            })
        });
        $(document).on('click', '#cancel', function (e) {
            e.preventDefault();
            var action = "cancel";
            $.ajax({
                type: "POST",
                data: {'do': action},
                url: "../../controllers/project/projectsController.php",
                success: function (data) {
                    if (data == "error") {
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to clear activities.</span></div><br>").hide().fadeIn(1000);
                        $("#wait").css("display", "none");
                        $("#save").removeAttr('disabled');


                    } else {
                        $("html, body").animate({ scrollTop: 0 }, "slow");

                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Activities cancelled successfully.</span></div><br>").hide().fadeIn(1000);
                        $('#files').val();
                        $("#filesuccess").css("display","none");
                        $('#uclisted').empty();
                        $("#wait").css("display", "none");
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Activities cancelled successfully.</span></div><br>").fadeOut(6000);

                    }

                }

            })
        });


        $(document).on('click','#confirm',function (e) {
            e.preventDefault();
            $("#wait").css("display","block");
            var action = "confirm";
            $.ajax({
                type:"POST",
                data:{'do':action},
                url:"../../controllers/project/projectsController.php",
                success:function (data) {
                    if(data=="error"){
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to project.</span></div><br>").hide().fadeIn(1000);
                        $("#wait").css("display","none");
                        $("#confirm").removeAttr('disabled');
                    }else {
                        $("html, body").animate({ scrollTop: 0 }, "slow");

                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Activities confirmed successfully.</span></div><br>").hide().fadeIn(1000);

                        $('#uclisted').empty();
                        $("#filesuccess").css("display","none");
                        $("#wait").css("display","none");
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Activities confirmed successfully.</span></div><br>").fadeOut(6000);

                    }

                }

            })
        });
    $(document).on("change","#files",function(e){
        e.preventDefault();
        $("#activity_error").empty();
        $("#filesuccess").css("display","none");
        $("#fileerror").css("display","none");
        $("#pdf").css("display","none");
        $("#word").css("display","none");
        var filename = $(this).val();
        var type =  filename.split('.').pop();
        filename = filename.split(/[\\/]/g).pop().split('.')[0];

        if(type === "xlsx" || type === "xls"){
           $("#filesuccess").html('<p class=" note text-justify"><i class="fa fa-check"></i> '+ filename +'.'+type+'</p>');
            $("#filesuccess").css("display","block");
        }
        else
        {
            $("#fileerror").html(' <p class=" note text-justify"><i class="fa fa-times"></i> Please select a <strong>microsoft office excel file(xlsx)</strong></p>');
            $("#fileerror").css("display","block");
            $("#files").val("");
        }

    })
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

