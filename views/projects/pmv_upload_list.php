<?php
require_once('../../classes/mysql.class.php');
$page = "pmv";
$sub_page_name = "val_pmv";
$chekLogin = new MySQL();
$chekLogin->checkLogin();

$getVendor = new MySQL();
$getVendor->Query("SELECT * FROM implementing_partners WHERE status = 'Active' ORDER BY name ASC");

$getOutcomes = new MySQL();
$getOutcomes->Query("SELECT * FROM outcomes");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:56:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>HEMS | Find PMV Uploads</title>
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
            <li><a href="javascript:;">PMV</a></li>
            <li class="active">Find PMV Upload</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">PMV <small>find pmv upload...</small></h1>
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
                        <h4 class="panel-title">Find PMV Upload</h4>
                    </div>
                    <div class="panel-body">
                        <div>
                            <p align="center" style="display: none; color: limegreen;" id="f_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                        </div>
                        <div class="row">
                            <form method="POST" action="" id="findForm">
                                <table class="table table-responsive table-striped table-bordered" align="center">
                                    <tbody>
                                        <tr>
                                            <td>Vendor</td>
                                            <td>Outcome Area</td>
                                            <td>Year</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    <tr>
                                        <td><select id="vendor" name="vendor" class="form-control">
                                                <option disabled selected>--SELECT VENDOR--</option>
                                                <?php while(!$getVendor->EndOfSeek()){$vrow = $getVendor->Row();?>
                                                    <option value="<?php echo $vrow->ip_code;?>"><?php echo $vrow->name;?></option>
                                                <?php } ?>
                                        </select><span id="venderror"></span></td>
                                        <td><select id="outcome" name="outcome" class="form-control">
                                                <option disabled selected>--SELECT OUTCOME--</option>
                                                <?php while(!$getOutcomes->EndOfSeek()){$orow = $getOutcomes->Row();?>
                                                    <option value="<?php echo $orow->code;?>"><?php echo $orow->name;?></option>
                                                <?php } ?>
                                            </select><span id="incerror"></span></td>
                                        <td>
                                            <select id="year" name="year" class="form-control">
                                                <option disabled selected>--YEAR--</option>
                                                <?php for(($i=date('Y')); $i<=date('Y')+20; $i++){?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php }?>
                                            </select><span id="yerror"></span>
                                        </td>
                                        <td>
                                            <input type="submit" name="find" id="find" value="Find" class="btn btn-primary">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div id="findResponse"></div>

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
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<script src="../../assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="../../assets/js/table-manage-default.demo.min.js"></script>
<script src="../../assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        TableManageDefault.init();
        FormPlugins.init();
    });

    //Save PMV follow up and planned actions
    $(function () {

        var $buttons = $("#find");
        var $form = $("#findForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#findResponse").empty();
            $("#venderror").empty();
            $("#incerror").empty();
            $("#yerror").empty();

            var vend = $.trim($("#vendor").val());
            var inc = $.trim($("#outcome").val());
            var year = $.trim($("#year").val());


            if(vend.length == 0){

                $("#venderror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
            if(inc.length == 0){

                $("#incerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
            if(year.length == 0){

                $("#yerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }


            if(vend.length != 0 && inc.length != 0 && year.length != 0){

                $("#find").attr("disabled", "disabled");
                $("#f_wait").css("display","block");
                $("html, body").animate({ scrollTop: $("#findResponse").position().top }, "slow");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/fetchUploads.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="zero"){

                            $('#findResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>No Records Found.</span></div><br>").hide().fadeIn(1000);
                            $("#f_wait").css("display","none");
                            $("#find").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#findResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Found Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#f_wait").css("display","none");
                            $("#find").removeAttr('disabled');

                        }else{

                            $("#f_wait").css("display","none");
                            $("#find").removeAttr('disabled');
                            $('#findResponse').html(e);

                        }

                    }
                });
                return false;
            }
        });

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

