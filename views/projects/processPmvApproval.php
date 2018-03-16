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
    $dbConnect->Query("SELECT programmes.name as progname,pmv.visit_startdate, pmv.visit_enddate, regions.region_name,
                       district.name as dname, pmv.sub_district, pmv.community,pmv.purpose,pmv.related_workplan_act,
                       pmv.related_workplan_output,pmv.prog_document_out,pmv.prog_document_ref,pmv.baseline,pmv.target,
                        pmv.verification,pmv.intervention_period_start,pmv.intervention_period_end,pmv.imp_partner,
                         pmv.persons_to_meet, pmv.last_field_visit, pmv.intervention_value FROM pmv
                       LEFT JOIN programmes ON pmv.section = programmes.id
                       LEFT JOIN regions ON pmv.region = regions.id
                       LEFT JOIN district ON pmv.district = district.name
                        WHERE pmv.id = $pmvid");
    $pmvRecRow = $dbConnect->Row();
}

$pmvObj = new Pmv();

$getPrevRecomm = new MySQL();
$getPrevRecomm->Query("SELECT * FROM pmv_prev_recomm WHERE pmv_id = $pmvid");
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
                                    <td colspan="2"><label>Person(s) Undertaking Visit:</label></td>
                                    <td colspan="4"><?php echo $pmvObj->fetchOfficers($pmvid);?></td>
                                </tr>
                                <tr>
                                    <td class="col-lg-1"><label>Section:</label></td>
                                    <td class="col-lg-3"><?php echo $pmvRecRow->progname;?></td>

                                    <td class="col-lg-1"><label>Date of Visit:</label></td>
                                    <td class="col-lg-3">
                                        <div>
                                            <div class="input-group input-daterange">
                                                <?php echo $pmvRecRow->visit_startdate.' To '.$pmvRecRow->visit_enddate;?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-lg-1"><label>Region:</label></td>
                                    <td class="col-lg-3"><?php echo $pmvRecRow->region_name;?></td>
                                </tr>
                                <tr>

                                    <td><label>District:</label></td>
                                    <td><?php echo $pmvRecRow->region_name;?></td>

                                    <td><label>Sub-district:</label></td>
                                    <td><?php echo $pmvRecRow->sub_district;?></td>

                                    <td><label>Community:</label></td>
                                    <td><?php echo $pmvRecRow->community;?></td>
                                </tr>

                                </tbody>
                            </table>
                                <input type="hidden" name="pmvid" id="pmvid" value="<?php echo $pmvid;?>">
                            </form>
                            <div class="panel-heading">
                                <h4 class="panel-title">Section A. Preparation - Programme Information</h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">

                                        <table class="table table-responsive">
                                            <tbody>
                                            <tr>
                                                <td class="col-lg-2"><label>Purpose</label></td>
                                                <td colspan="3"><p><?php echo $pmvRecRow->purpose;?></p></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><div class="alert alert-info" style="text-align: center;"><h5>Programme Reference</h5></div></td>
                                            </tr>
                                            <tr>
                                                <td class="col-lg-2"><label>Related Work Plan Output(s)</label></td>
                                                <td class="col-lg-4"><p><?php echo $pmvRecRow->related_workplan_output;?></p></td>

                                                <td class="col-lg-2"><label>Related Work Plan Activities(s)</label></td>
                                                <td class="col-lg-4"><p><?php echo $pmvRecRow->related_workplan_act;?></p></td>
                                            </tr>
                                            <tr>
                                                <td><label>Programme Document Name/Reference #:</label></td>
                                                <td><p><?php echo $pmvRecRow->prog_document_ref;?></p></td>

                                                <td><label>Programme Document Output(s)</label></td>
                                                <td><p><?php echo $pmvRecRow->prog_document_out;?></p></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><div class="alert alert-info" style="text-align: center;"><h5>Indicators for Workplan or Program Document</h5></div></td>
                                            </tr>
                                            <tr>
                                                <td><label>Baseline</label></td>
                                                <td><p><?php echo $pmvRecRow->baseline;?></p></td>

                                                <td><label>Target</label></td>
                                                <td><p><?php echo $pmvRecRow->target;?></p></td>
                                            </tr>
                                            <tr>
                                                <td><label>Means of Verification</label></td>
                                                <td><p><?php echo $pmvRecRow->verification;?></p></td>

                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><div class="alert alert-info" style="text-align: center;"><h5>Information Relating To Implementing Partner(Government, Civil Society, UN Agency)</h5></div></td>
                                            </tr>
                                            <tr>
                                                <td><label>Implementing Partner</label></td>
                                                <td><?php echo $pmvObj->getIPName($pmvRecRow->imp_partner);?></td>

                                                <td><label>Period of Intervention</label></td>
                                                <td><?php echo $pmvRecRow->intervention_period_start.' To '.$pmvRecRow->intervention_period_end;?></td>
                                            </tr>
                                            <tr>
                                                <td><label>Persons to Meet</label></td>
                                                <td><p><?php echo $pmvRecRow->persons_to_meet;?></p></td>
                                                <td><label>Last Field Visit</label></td>
                                                <td><?php echo $pmvRecRow->last_field_visit;?></td>
                                            </tr>
                                            <tr>
                                                <td><label>Total Value For The Intervention(US$)</label></td>
                                                <td><?php echo $pmvRecRow->intervention_value;?></td>
                                                <td colspan="2"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td colspan="4"><div class="alert alert-info" style="text-align: center;"><h5>Status of Previous Recommendations and Follow-up Actions (List all recommendations from the previous Field Trip Report and indicate status of follow-up/action taken)</h5></div></td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-2"><h5>Date of Visit</h5></td>
                                            <td class="col-lg-4"><h5>Section/Staff that Undertook Visit</h5></td>
                                            <td class="col-lg-3"><h5>Recommendation</h5></td>
                                            <td class="col-lg-2"><h5>Status of Implementation</h5></td>
                                        </tr>
                                        <?php while(!$getPrevRecomm->EndOfSeek()){ $gprrow = $getPrevRecomm->Row();?>
                                            <tr>
                                                <td><?php echo $gprrow->date_of_visit;?></td>
                                                <td><?php echo $pmvObj->fetchPrevRecommOfficers($gprrow->id);?></td>
                                                <td><?php echo $gprrow->recomm;?></td>
                                                <td><?php echo $gprrow->impl;?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                       </div>
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

