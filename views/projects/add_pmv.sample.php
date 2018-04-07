<?php
require_once('../../classes/mysql.class.php');
$page = "pmv";
$sub_page_name = "add_pmv";
$chekLogin = new MySQL();
$chekLogin->checkLogin();


?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:56:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>HEMS | Add PMV</title>
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
            <li class="active">Add PMV</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">PMV <small>add pmv...</small></h1>
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
                        <h4 class="panel-title">Add PMV</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <form id="backgrounfInfoForm" method="POST" action="">
                                <table class="table table-responsive">
                                    <tr>
                                        <td class="col-lg-1"><label>Date of Visit<font style="color: red">*</font>:</label></td>
                                        <td  colspan="3" class="col-lg-3">
                                            <div>
                                                <div class="input-group input-daterange">
                                                    <input type="text" class="form-control" name="start" id="start" placeholder="Date Start" /><span id="starterror"></span>
                                                    <span class="input-group-addon">to</span>
                                                    <input type="text" class="form-control" name="end" id="end" placeholder="Date End" />
                                                    <span id="enderror"></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2"><label>Objectives<font style="color: red">*</font>:</label></td>
                                        <td class="col-lg-4"><textarea class="form-control" name="objectives" id="objectives"></textarea><span id="objerror"></span></td>

                                        <td class="col-lg-2"><label>Partner Name<font style="color: red">*</font>:</label></td>
                                        <td class="col-lg-4"><input type="text" class="form-control" name="partner_name" id="partner_name"><span id="pnerror"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2"><label>Partner Location<font style="color: red">*</font>:</label></td>
                                        <td class="col-lg-4"><input type="text" class="form-control" name="partner_loc" id="partner_loc"><span id="plerror"></span></td>

                                        <td class="col-lg-2"><label>Outputs<font style="color: red">*</font>:</label></td>
                                        <td class="col-lg-4"><textarea class="form-control" name="outputs" id="outputs"></textarea><span id="outerror"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2"><label>Total Cash Contribution Of Programmes<font style="color: red">*</font>:</label></td>
                                        <td class="col-lg-4"><input type="text" class="form-control" name="cash_contri" id="cash_contri"></td>

                                        <td class="col-lg-2"><label>Supplies Already Provided As Part Of Program<font style="color: red">*</font>:</label></td>
                                        <td class="col-lg-4"><input type="text" class="form-control" name="supplies" id="supplies"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="12"><div class="alert alert-info" style="text-align: center;"><h5>Progress Reporting</h5></div></td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2"><label>Access To Inputs/Services<font style="color: red">*</font>:</label></td>
                                        <td colspan="3" class="col-lg-10"><textarea class="form-control" name="access_input_serv" id="access_input_serv"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2"><label>Quality To Inputs/Services<font style="color: red">*</font>:</label></td>
                                        <td colspan="3" class="col-lg-10"><textarea class="form-control" name="qual_input_serv" id="qual_input_serv"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2"><label>Utilisation To Inputs/Services<font style="color: red">*</font>:</label></td>
                                        <td colspan="3" class="col-lg-10"><textarea class="form-control" name="uti_input_serv" id="uti_input_serv"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2"><label>Enabling Environment<font style="color: red">*</font>:</label></td>
                                        <td colspan="3" class="col-lg-10"><textarea class="form-control" name="enab_environ" id="enab_environ"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2"><label>Overall assessment of the extent to which the programme is progressing in relation to the expected results for the year<font style="color: red">*</font>:</label></td>
                                        <td colspan="3" class="col-lg-10"><textarea class="form-control" name="assessment" id="assessment"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2"><label>Outstanding related concerns from the tracking sheet or previous PMV <font style="color: red">*</font>:</label></td>
                                        <td colspan="3" class="col-lg-10"><textarea class="form-control" name="outstanding" id="outstanding"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2"><label>Other issues/concerns <font style="color: red">*</font>:</label></td>
                                        <td colspan="3" class="col-lg-10"><textarea class="form-control" name="issues_concerns" id="issues_concerns"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td colspan="12"><input style="float:right;" class="btn btn-sm btn-success" type="submit" name="saveBackground" id="saveBackground" value="Save Background Information"></td>
                                    </tr>
                                    </table>
                                </form>


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
<!--<script src="../../assets/crossbrowserjs/html5shiv.js"></script>-->
<!--<script src="../../assets/crossbrowserjs/respond.min.js"></script>-->
<!--<script src="../../assets/crossbrowserjs/excanvas.min.js"></script>-->
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

    $('#start').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#end').datepicker({
        format: 'yyyy-mm-dd'
    });

</script>
<script type="text/javascript">
    //Save PMV Background Information
    $(function () {

        var $buttons = $("#saveBackground");
        var $form = $("#backgrounfInfoForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#backgroundResponse").empty();
            $("#starterror").empty();
            $("#enderror").empty();
            $("#pnerror").empty();
            $("#plerror").empty();
            $("#outerror").empty();
            $("#objerror").empty();

            var obj = $.trim($("#objectives").val());
            var vstart = $.trim($("#start").val());
            var vend = $.trim($("#end").val());
            var pname = $.trim($("#partner_name").val());
            var ploc = $.trim($("#partner_loc").val());
            var output = $.trim($("#outputs").val());

            if(obj.length == 0){

                $("#objerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
            if(vstart.length == 0){
                $("#starterror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
            if(vend.length == 0){
                $("#enderror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
            if(pname.length == 0){
                $("#pnerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
            if(ploc.length == 0){
                $("#plerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(obj.length != 0 && vstart.length != 0 && vend.length != 0 && ploc.length != 0 && output.length != 0){

                $("#saveBackground").attr("disabled", "disabled");
                $("#bg_wait").css("display","block");
                $("html, body").animate({ scrollTop: 0 }, "slow");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveBackgroundInfo.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="fail"){

                            $('#backgroundResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Background Information Failed To Save.</span></div><br>").hide().fadeIn(1000);
                            $("#bg_wait").css("display","none");
                            $("#saveBackground").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#backgroundResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Background Information Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#bg_wait").css("display","none");
                            $("#saveBackground").removeAttr('disabled');
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

