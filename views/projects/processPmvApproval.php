<?php
require_once('../../classes/mysql.class.php');
require_once('../../classes/Pmv.class.php');
$page = "pmv";
$sub_page_name = "appr_pmv";
$chekLogin = new MySQL();
$chekLogin->checkLogin();

if(isset($_GET['pmvid']) && !empty($_GET['pmvid'])){

    $pmvid = base64_decode($_GET['pmvid']);
    $dbConnect = new MySQL();
    $dbConnect->Query("SELECT pmv_light.*,implementing_partners.name,implementing_partners.risk_rating FROM pmv_light LEFT JOIN implementing_partners ON pmv_light.ip_code = implementing_partners.ip_code WHERE pmv_light.id = $pmvid");
    $pmvRecRow = $dbConnect->Row();
}

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:56:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>HEMS | Approve PMV</title>
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
            <li class="active">Process PMV Approval</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">PMV <small>process approval pmv...</small></h1>
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
                        <h4 class="panel-title">Process PMV Approval</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div><div id="apprResponse"></div>
                                <div>
                                    <p align="center" style="display: none; color: limegreen;" id="appr_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                </div></div>
                            <form method="post" action="" id="approvePmvForm">
                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <td colspan="6"><input style="float: right;" type="submit" name="approve" id="approve" value="Approve PMV" class="btn btn-sm btn-success"></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-1"><label>Start Date:</label></td>
                                    <td class="col-lg-3"><?php echo $pmvRecRow->start_date;?></td>

                                    <td class="col-lg-1"><label>End Date:</label></td>
                                    <td class="col-lg-3"><?php echo $pmvRecRow->end_date;?></td>

                                    <td class="col-lg-1"><label>Objectives:</label></td>
                                    <td class="col-lg-3"><?php echo $pmvRecRow->objectives;?></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-1"><label>Partner Name:</label></td>
                                    <td class="col-lg-3"><?php echo $pmvRecRow->name;?></td>


                                    <td class="col-lg-1"><label>Total Cash Contribution:</label></td>
                                    <td class="col-lg-3"><?php echo $pmvRecRow->total_cash_contrib;?></td>

                                    <td><label>Supplies:</label></td>
                                    <td><?php echo $pmvRecRow->supplies;?></td>

                                </tr>

                                </tbody>
                            </table>
                                <input type="hidden" name="pmvid" id="pmvid" value="<?php echo $pmvid;?>">
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
</script>
<script type="text/javascript">
    //Submit pmv
    $(function () {

        var $buttons = $("#approve");
        var $pmvid = $("#pmvid").val();

        $buttons.click(function (e) {

            e.preventDefault();
            $("#apprResponse").empty();


            $("#approve").attr("disabled", "disabled");
            $("#appr_wait").css("display","block");
            $("html, body").animate({ scrollTop: $("#apprResponse").position().top }, "slow");

            $.ajax({
                type: "POST",
                url: "../../controllers/project/savePmvApproval.php",
                data: {pmvid:$pmvid},
                success: function(e) {

                    if(e=="fail"){

                        $('#apprResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>PMV approval failed.</span></div><br>").hide().fadeIn(1000);
                        $("#appr_wait").css("display","none");
                        $("#approve").removeAttr('disabled');

                    }else if(e=="ok"){

                        $('#apprResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>PMV Approved Successfully.</span></div><br>").hide().fadeIn(1000);
                        $("#appr_wait").css("display","none");
                        $("#approve").removeAttr('disabled');

                    }
                }
            });
            return false;

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

