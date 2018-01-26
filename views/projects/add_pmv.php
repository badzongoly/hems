<?php
require_once('../../classes/mysql.class.php');
require_once('../../classes/Pmv.class.php');
$page = "project";
$sub_page_name = "add_pmv";

$chekLogin = new MySQL();
$chekLogin->checkLogin();

$getAservComment = new Pmv();

if(isset($_SESSION['hems_active_pmv']) && !empty($_SESSION['hems_active_pmv']) && $_SESSION['hems_active_pmv'] > 0){

    $pmvid = $_SESSION['hems_active_pmv'];

}else{

    $_SESSION['hems_active_pmv'] = 0;
    $pmvid = $_SESSION['hems_active_pmv'];

}

if(isset($_GET['pid']) && !empty($_GET['pid'])){

    $projectid = base64_decode($_GET['pid']);

    $getStaff = new MySQL();
    $getStaff->Query("SELECT * FROM staff_pdetail WHERE status = 'active'");

    $getSection = new MySQL();
    $getSection->Query("SELECT * FROM section WHERE status = 'active'");

    $getRegion = new MySQL();
    $getRegion->Query("SELECT * FROM regions ORDER BY region_name ASC");

    $getDistrict = new MySQL();
    $getDistrict->Query("SELECT * FROM district ORDER BY name ASC");

    $getPartners = new MySQL();
    $getPartners->Query("SELECT * FROM implementing_partners WHERE status = 'Active' ORDER BY name ASC");

    $getAccessServices = new MySQL();
    $getAccessServices->Query("SELECT * FROM access_to_services");

    $getSelections = new MySQL();
    $getSelections->Query("SELECT * FROM pmv_access_services WHERE pmv_id = $pmvid");
    $selCount = $getSelections->RowCount();

    $selArray = array();

    if($selCount){
        while(!$getSelections->EndOfSeek()){
            $srow = $getSelections->Row();
            $selArray[] = $srow->access_service_id;
        }
    }

    $getQualityServices = new MySQL();
    $getQualityServices->Query("SELECT * FROM quality_of_services");

    $getQSelections = new MySQL();
    $getQSelections->Query("SELECT * FROM pmv_quality_services WHERE pmv_id = $pmvid");
    $selQCount = $getQSelections->RowCount();

    $qselArray = array();

    if($selQCount){
        while(!$getQSelections->EndOfSeek()){
            $sqrow = $getQSelections->Row();
            $qselArray[] = $sqrow->quality_service_id;
        }
    }

    $getUtilServices = new MySQL();
    $getUtilServices->Query("SELECT * FROM utilisation_of_services");

    $getUSelections = new MySQL();
    $getUSelections->Query("SELECT * FROM pmv_util_services WHERE pmv_id = $pmvid");
    $selUCount = $getUSelections->RowCount();

    $uselArray = array();

    if($selUCount){
        while(!$getUSelections->EndOfSeek()){
            $uqrow = $getUSelections->Row();
            $uselArray[] = $uqrow->util_service_id;
        }
    }

    $getEnablingEnv = new MySQL();
    $getEnablingEnv->Query("SELECT * FROM enabling_env");

    $getESelections = new MySQL();
    $getESelections->Query("SELECT * FROM pmv_enabling_env WHERE pmv_id = $pmvid");
    $selECount = $getESelections->RowCount();

    $eselArray = array();

    if($selECount){
        while(!$getESelections->EndOfSeek()){
            $eqrow = $getESelections->Row();
            $eselArray[] = $eqrow->enab_env_id;
        }
    }

    $getStatRec = new MySQL();
    $getStatRec->Query("SELECT * FROM statistics_and_records");

    $getSRSelections = new MySQL();
    $getSRSelections->Query("SELECT * FROM pmv_statistics_records WHERE pmv_id = $pmvid");
    $selSRCount = $getSRSelections->RowCount();

    $srselArray = array();

    if($selSRCount){
        while(!$getSRSelections->EndOfSeek()){
            $strrow = $getSRSelections->Row();
            $srselArray[] = $strrow->stat_rec_id;
        }
    }

}else{
    header('Location:');
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
            <li><a href="javascript:;">Projects</a></li>
            <li class="active">Add PMV</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Project <small>add PMV...</small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-md-12 col-xs-6">
                <!-- begin panel -->
                <div class="panel panel-default" data-sortable-id="form-stuff-1">
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
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#default-tab-1" data-toggle="tab"><h4>Background Information</h4></a></li>
                                <li class=""><a href="#default-tab-2" data-toggle="tab"><h4>Section A. Preparation</h4></a></li>
                                <li class=""><a href="#default-tab-3" data-toggle="tab"><h4>Section B. Data Collection</h4></a></li>
                                <li class=""><a href="#default-tab-4" data-toggle="tab"><h4>Section C. Reporting</h4></a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="default-tab-1">
                            <!--Background info panel begin -->
                            <div class="panel panel-primary" data-sortable-id="form-stuff-1">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Background Information</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div id="backgroundResponse"></div>
                                        <div>
                                            <p align="center" style="display: none; color: limegreen;" id="bg_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                        </div>
                                        <form id="backgrounfInfoForm" method="POST" action="">
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td class="col-lg-1"><label>Person(s) Undertaking Visit<font style="color: red">*</font>:</label></td>
                                                    <td class="col-lg-3">
                                                        <select class="multiple-select2 form-control" multiple="multiple" name="officers[]" id="officers">
                                                            <?php while(!$getStaff->EndOfSeek()){$stfRow = $getStaff->Row();?>
                                                            <option value="<?php echo $stfRow->empID;?>"><?php echo $stfRow->first_name.' '.$stfRow->last_name;?></option>
                                                            <?php } ?>
                                                            </select><span id="officererror"></span>
                                                    </td>
                                                    <td class="col-lg-1"><label>Section<font style="color: red">*</font>:</label></td>
                                                    <td class="col-lg-3">
                                                        <select class="default-select2 form-control" name="section" id="section">
                                                            <option selected disabled>--SELECT--</option>
                                                            <?php while(!$getSection->EndOfSeek()){$secRow = $getSection->Row();?>
                                                                <option value="<?php echo $secRow->id;?>"><?php echo $secRow->section_name;?></option>
                                                            <?php } ?>
                                                        </select><span id="sectionerror"></span>
                                                    </td>

                                                    <td class="col-lg-1"><label>Date of Visit<font style="color: red">*</font>:</label></td>
                                                    <td class="col-lg-3">
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
                                                <td><label>Region<font style="color: red">*</font>:</label></td>
                                                <td>
                                                    <select class="default-select2 form-control" name="region" id="region">
                                                        <option selected disabled>--SELECT--</option>
                                                        <?php while(!$getRegion->EndOfSeek()){$regRow = $getRegion->Row();?>
                                                            <option value="<?php echo $regRow->id;?>"><?php echo $regRow->region_name;?></option>
                                                        <?php } ?>
                                                    </select><span id="regionerror"></span>
                                                </td>
                                                <td><label>District<font style="color: red">*</font>:</label></td>
                                                <td>
                                                    <select class="default-select2 form-control" name="district" id="district">
                                                        <option selected disabled>--SELECT--</option>
                                                        <?php while(!$getDistrict->EndOfSeek()){$disRow = $getDistrict->Row();?>
                                                            <option value="<?php echo $disRow->id;?>"><?php echo $disRow->name;?></option>
                                                        <?php } ?>
                                                    </select><span id="districterror"></span>
                                                </td>

                                                <td><label>Sub-district:</label></td>
                                                <td><input type="text" class="form-control" name="subdistrict" id="subdistrict"></td>
                                            </tr>
                                                <tr>
                                                    <td><label>Community:</label></td>
                                                    <td><input type="text" class="form-control" name="community" id="community"></td>
                                                    <td colspan="4"></td>

                                                </tr>
                                            <tr>
                                                <td colspan="6"><input style="float:right;" class="btn btn-sm btn-success" type="submit" name="saveBackground" id="saveBackground" value="Save Background Information"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                            <input type="hidden" name="pid" value="<?php echo $projectid;?>">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Background info panel end -->
                                    </div>
                                <div class="tab-pane fade in" id="default-tab-2">
                            <!--section a begin -->
                            <div class="panel panel-primary" data-sortable-id="form-stuff-1">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Section A. Preparation - Programme Information</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div id="sectionaResponse"></div>
                                        <div>
                                            <p align="center" style="display: none; color: limegreen;" id="sa_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                        </div>
                                        <form id="sectionAForm" method="POST" action="">
                                        <table class="table table-responsive">
                                            <tbody>
                                            <tr>
                                                <td class="col-lg-2"><label>Purpose</label></td>
                                                <td colspan="3"><textarea class="form-control col-lg-10" name="purpose" id="purpose"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><div class="alert alert-info" style="text-align: center;"><h5>Programme Reference</h5></div></td>
                                            </tr>
                                                <tr>
                                                    <td class="col-lg-2"><label>Related Work Plan Output(s)</label></td>
                                                    <td class="col-lg-4"><textarea class="form-control" name="rwo" id="rwo"></textarea></td>

                                                    <td class="col-lg-2"><label>Related Work Plan Activities(s)</label></td>
                                                    <td class="col-lg-4"><textarea class="form-control" name="rwa" id="rwa"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Programme Document Name/Reference #:</label></td>
                                                    <td><input class="form-control" name="prog_doc_name" id="prog_doc_name"></td>

                                                    <td><label>Programme Document Output(s)</label></td>
                                                    <td><textarea class="form-control" name="pdout" id="pdout"></textarea></td>
                                                </tr>
                                            <tr>
                                                <td colspan="4"><div class="alert alert-info" style="text-align: center;"><h5>Indicators for Workplan or Program Document</h5></div></td>
                                            </tr>
                                            <tr>
                                                <td><label>Baseline</label></td>
                                                <td><textarea class="form-control" name="baseline" id="baseline"></textarea></td>

                                                <td><label>Target</label></td>
                                                <td><textarea class="form-control" name="target" id="target"></textarea></td>
                                            </tr>
                                                <tr>
                                                    <td><label>Means of Verification</label></td>
                                                    <td><textarea class="form-control" name="verification" id="verification"></textarea></td>

                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"><div class="alert alert-info" style="text-align: center;"><h5>Information Relating To Implementing Partner(Government, Civil Society, UN Agency)</h5></div></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Implementing Partner</label></td>
                                                    <td><select class="default-select2 form-control" name="ip" id="ip" style="width: 200px;">
                                                            <option selected disabled>--SELECT OPTION--</option>
                                                            <?php while(!$getPartners->EndOfSeek()){$ipRow = $getPartners->Row();?>
                                                                <option value="<?php echo $ipRow->id;?>"><?php echo $ipRow->name;?></option>
                                                            <?php } ?>
                                                        </select></td>

                                                    <td><label>Period of Intervention</label></td>
                                                    <td>
                                                        <div>
                                                            <div class="input-group input-daterange">
                                                                <input type="text" class="form-control" name="int_start" id="int_start" placeholder="Date Start" />
                                                                <span class="input-group-addon">to</span>
                                                                <input type="text" class="form-control" name="int_end" id="int_end" placeholder="Date End" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label>Persons to Meet</label></td>
                                                    <td><textarea class="form-control" name="persons_to_meet" id="persons_to_meet"></textarea></td>
                                                    <td><label>Last Field Visit</label></td>
                                                    <td>
                                                        <input type="text" name="fv_date"  class="form-control" id="datepicker-default" placeholder="Date of Last Field Visit" /> <span id="lfv_error"></span>
                                                    </td>
                                                </tr>
                                            <tr>
                                                <td><label>Total Value For The Intervention(US$)</label></td>
                                                <td><input type="text" name="intervention_value" id="intervention_value" class="form-control" onkeypress="return isNumberKey(event)"></td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><input style="float:right;" class="btn btn-sm btn-success" type="submit" name="saveSectionA" id="saveSectionA" value="Save Background Information"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                            </form>
                                        <form method="POST" action="" id="followupForm">

                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="5"><div class="alert alert-info" style="text-align: center;"><h5>Status of Previous Recommendations and Follow-up Actions (List all recommendations from the previous Field Trip Report and indicate status of follow-up/action taken)</h5></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5"><div id="followupResponse"></div>
                                                            <div>
                                                                <p align="center" style="display: none; color: limegreen;" id="fu_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-lg-2"><h5>Date of Visit</h5></td>
                                                        <td class="col-lg-4"><h5>Section/Staff that Undertook Visit</h5></td>
                                                        <td class="col-lg-3"><h5>Recommendation</h5></td>
                                                        <td class="col-lg-2"><h5>Status of Implementation</h5></td>
                                                        <td></td>
                                                    </tr>
                                                <tr>
                                                    <td><input type="text" name="v_date"  class="form-control v_date" id="datepicker-default2" placeholder="Date of Visit" /><span id="v_error"></span></td>
                                                    <td><select style="width: 350px;" class="multiple-select2 form-control" multiple="multiple" name="rec_officers[]" id="rec_officers">
                                                            <?php $getStaff->MoveFirst(); while(!$getStaff->EndOfSeek()){$stfRow = $getStaff->Row();?>
                                                                <option value="<?php echo $stfRow->empID;?>"><?php echo $stfRow->first_name.' '.$stfRow->last_name;?></option>
                                                            <?php } ?>
                                                        </select><span id="recofficererror"></span></td>
                                                    <td><textarea id="prevRecc" name="prevRecc" class="form-control"></textarea></td>
                                                    <td><textarea id="prevStatus" name="prevStatus" class="form-control"></textarea></td>
                                                    <td><input type="submit" name="savePrev" id="savePrev" value="Save" class="btn btn-success"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                        <div id="followupList">

                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <!--section a end -->
                                    </div><!--tab 2 end -->

                                <div class="tab-pane fade in" id="default-tab-3">
                                    <!--section b begin -->
                                    <div class="panel panel-primary" data-sortable-id="form-stuff-1">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Section B. Data Collection</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <form method="POST" action="" id="accessServiceForm">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="3"><div id="asResponse"></div>
                                                            <div>
                                                                <p align="center" style="display: none; color: limegreen;" id="aserv_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                                            </div></td>
                                                    </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td><div class="alert alert-info">Access To Services</div></td>
                                                            <td><div class="alert alert-info">Comments/Situation</div></td>
                                                        </tr>
                                                    <?php while(!$getAccessServices->EndOfSeek()){ $asrow = $getAccessServices->Row();?>
                                                        <tr>
                                                            <td style="width:35px;"><input type="checkbox" name="aserv[]" id="aserv" value="<?php echo $asrow->id;?>" <?php if(in_array($asrow->id,$selArray)){echo "checked";}?>></td>
                                                            <td style="width: 300px;"><?php echo $asrow->access_to_services;?></td>
                                                            <td><textarea name="comment[<?php echo $asrow->id;?>]" id="comment" class="form-control"><?php if(in_array($asrow->id,$selArray)){echo $getAservComment->getAccessServiceComment($pmvid,$asrow->id);}?></textarea></td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td colspan="3"><input style="float: right;" type="submit" name="saveAService" id="saveAService" value="Save Access To Services" class="btn btn-sm btn-success"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                    </form>
                                                <form method="POST" action="" id="qualityServiceForm">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="3"><div id="qsResponse"></div>
                                                            <div>
                                                                <p align="center" style="display: none; color: limegreen;" id="qserv_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><div class="alert alert-info">Quality Of Services</div></td>
                                                        <td><div class="alert alert-info">Comments/Situation</div></td>
                                                    </tr>
                                                    <?php while(!$getQualityServices->EndOfSeek()){ $qsrow = $getQualityServices->Row();?>
                                                        <tr>
                                                            <td style="width:35px;"><input type="checkbox" name="qserv[]" id="qserv" value="<?php echo $qsrow->id;?>" <?php if(in_array($qsrow->id,$qselArray)){echo "checked";}?>></td>
                                                            <td style="width: 300px;"><?php echo $qsrow->quality_of_services;?></td>
                                                            <td><textarea name="qcomment[<?php echo $qsrow->id;?>]" id="qcomment" class="form-control"><?php if(in_array($qsrow->id,$qselArray)){echo $getAservComment->getQualityServiceComment($pmvid,$qsrow->id);}?></textarea></td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td colspan="3"><input style="float: right;" type="submit" name="saveQService" id="saveQService" value="Save Quality Of Services" class="btn btn-sm btn-success"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                    </form>
                                                <form method="POST" action="" id="utilServiceForm">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="3"><div id="usResponse"></div>
                                                            <div>
                                                                <p align="center" style="display: none; color: limegreen;" id="userv_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><div class="alert alert-info">Utilisation Of Services</div></td>
                                                        <td><div class="alert alert-info">Comments/Situation</div></td>
                                                    </tr>
                                                    <?php while(!$getUtilServices->EndOfSeek()){ $usrow = $getUtilServices->Row();?>
                                                        <tr>
                                                            <td style="width:35px;"><input type="checkbox" name="userv[]" id="userv" value="<?php echo $usrow->id;?>" <?php if(in_array($usrow->id,$uselArray)){echo "checked";}?>></td>
                                                            <td style="width: 300px;"><?php echo $usrow->utilisation_of_services;?></td>
                                                            <td><textarea name="ucomment[<?php echo $usrow->id;?>]" id="ucomment" class="form-control"><?php if(in_array($usrow->id,$uselArray)){echo $getAservComment->getUtilServiceComment($pmvid,$usrow->id);}?></textarea></td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td colspan="3"><input style="float: right;" type="submit" name="saveUService" id="saveUService" value="Save Utilisation Of Services" class="btn btn-sm btn-success"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                    </form>
                                                <form method="POST" action="" id="enabEnvForm">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="3"><div id="evResponse"></div>
                                                            <div>
                                                                <p align="center" style="display: none; color: limegreen;" id="ev_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><div class="alert alert-info">Enabling Environment for Intervention</div></td>
                                                        <td><div class="alert alert-info">Comments/Situation</div></td>
                                                    </tr>
                                                    <?php while(!$getEnablingEnv->EndOfSeek()){ $eerow = $getEnablingEnv->Row();?>
                                                        <tr>
                                                            <td style="width:35px;"><input type="checkbox" name="enab[]" id="enab" value="<?php echo $eerow->id;?>" <?php if(in_array($eerow->id,$eselArray)){echo "checked";}?>></td>
                                                            <td style="width: 300px;"><?php echo $eerow->enabling_env_interv;?></td>
                                                            <td><textarea name="encomment[<?php echo $eerow->id;?>]" id="encomment" class="form-control"><?php if(in_array($eerow->id,$eselArray)){echo $getAservComment->getEnabEnvComment($pmvid,$eerow->id);}?></textarea></td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td colspan="3"><input style="float: right;" type="submit" name="EnabInt" id="EnabInt" value="Save Enabling Environment for Intervention" class="btn btn-sm btn-success"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                                <form method="POST" action="" id="statRecForm">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="3"><div id="srResponse"></div>
                                                            <div>
                                                                <p align="center" style="display: none; color: limegreen;" id="sr_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td><div class="alert alert-info">Statistics and Records</div></td>
                                                        <td><div class="alert alert-info">Comments/Situation</div></td>
                                                    </tr>
                                                    <?php while(!$getStatRec->EndOfSeek()){ $srrow = $getStatRec->Row();?>
                                                        <tr>
                                                            <td style="width:35px;"><input type="checkbox" name="statRec[]" id="statRec" value="<?php echo $srrow->id;?>" <?php if(in_array($srrow->id,$srselArray)){echo "checked";}?>></td>
                                                            <td style="width: 300px;"><?php echo $srrow->statistics_records;?></td>
                                                            <td><textarea name="srcomment[<?php echo $srrow->id;?>]" id="srcomment" class="form-control"><?php if(in_array($srrow->id,$srselArray)){echo $getAservComment->getStatRecords($pmvid,$srrow->id);}?></textarea></td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td colspan="3"><input style="float: right;" type="submit" name="saveStatRec" id="saveStatRec" value="Statistics and Records" class="btn btn-sm btn-success"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--section b end-->

                                <div class="tab-pane fade in" id="default-tab-4">
                                    <!--section b begin -->
                                    <div class="panel panel-primary" data-sortable-id="form-stuff-1">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Section C. Reporting</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2"><div class="alert alert-info" style="text-align: center;"><h5>A. Progress Reporting</h5></div></td>
                                                            </tr>
                                                        <tr>
                                                            <td class="col-lg-10"><textarea name="prog_reporting" id="prog_reporting" class="form-control"></textarea></td>
                                                            <td class="col-lg-12"><input type="submit"  name="savePrep" id="savePrep" class="btn btn-success btn-sm" value="Save Progress Report"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-responsive">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3"><div class="alert alert-info" style="text-align: center;"><h5>B. Status of Indicators</h5></div></td>
                                                        </tr>
                                                    <tr>
                                                        <td><h5>Indicators (Baselines and Targets)</h5></td>
                                                        <td><h5>Progress on Indicators/Targets</h5></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td><textarea name="indicators" id="indicators" class="form-control"></textarea></td>
                                                        <td><textarea name="progress" id="progress" class="form-control"></textarea></td>
                                                        <td><input type="submit" name="saveIndi" id="saveIndi" value="Save Indicator" class="btn btn-success btn-sm"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="4"><div class="alert alert-info" style="text-align: center;"><h5>C. Constraints/Challenges/Opportunities- (Related to this Project/intervention implementation and achievement of results)</h5></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h5>Constraints/Challenges</h5></td>
                                                        <td><h5>Lessons Learned</h5></td>
                                                        <td><h5>Opportunities</h5></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td><textarea name="constraints" id="constraints" class="form-control"></textarea></td>
                                                        <td><textarea name="less_learned" id="less_learned" class="form-control"></textarea></td>
                                                        <td><textarea name="opportunity" id="opportunity" class="form-control"></textarea></td>
                                                        <td><input type="submit" name="saveConst" id="saveConst" value="Save Constraint" class="btn btn-success btn-sm"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-responsive">
                                                    <tbody>
                                                    <tr>
                                                        <td colspan="3"><div class="alert alert-info" style="text-align: center;"><h5>D. Recommendations/Follow-up/Planned Actions</h5></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h5>Recommendation Name</h5></td>
                                                        <td><h5>Description</h5></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="recname" id="recname" class="form-control"></td>
                                                        <td><textarea name="recdesc" id="recdesc" class="form-control"></textarea></td>
                                                        <td><input type="submit" name="saveReco" id="saveReco" value="Save Recommendation" class="btn btn-success btn-sm"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--section b end-->


                                </div><!--tab content end -->
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

    $('#start').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#end').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('#int_start').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('#int_end').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('#datepicker-default').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('#datepicker-default2').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>
<script type="text/javascript">

    function isNumberKey(evt){

        var charcode = (evt.which)? evt.which : event.keyCode;
        if(charcode !=46 &&  charcode > 31 && (charcode < 48 || charcode > 57))
            return false;

        return true;


    }

</script>
<script type="text/javascript">
    //Save PMV Background Information
    $(function () {

        var $buttons = $("#saveBackground");
        var $form = $("#backgrounfInfoForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#backgroundResponse").empty();
            $("#sectionerror").empty();
            $("#starterror").empty();
            $("#enderror").empty();
            $("#regionerror").empty();
            $("#districterror").empty();

            var section = $.trim($("#section").val());
            var vstart = $.trim($("#start").val());
            var vend = $.trim($("#end").val());
            var region = $.trim($("#region").val());
            var district = $.trim($("#district").val());

            if(section.length == 0){

                $("#sectionerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
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
            if(region.length == 0){
                $("#regionerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
            if(district.length == 0){
                $("#districterror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(section.length != 0 && vstart.length != 0 && vend.length != 0 && region.length != 0 && district.length != 0){

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


    //Save Section A
    $(function () {

        var $buttons = $("#saveSectionA");
        var $form = $("#sectionAForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#sectionaResponse").empty();
            $("#iperror").empty();
            $("#iverror").empty();


            var ip = $.trim($("#ip").val());
            var iv = $.trim($("#intervention_value").val());


            if(ip.length == 0){

                $("#iperror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
            if(iv.length == 0){
                $("#iverror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }


            if(ip.length != 0 && iv.length != 0){

                $("#saveSectionA").attr("disabled", "disabled");
                $("#sa_wait").css("display","block");
                $("html, body").animate({ scrollTop: 0 }, "slow");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveSectionA.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="fail"){

                            $('#sectionaResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Section A. Failed To Save.</span></div><br>").hide().fadeIn(1000);
                            $("#sa_wait").css("display","none");
                            $("#saveSectionA").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#sectionaResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Section A. Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#sa_wait").css("display","none");
                            $("#saveSectionA").removeAttr('disabled');
                        }

                    }
                });
                return false;
            }
        });

    });

    //Save Followup
    $(function () {

        var $buttons = $("#savePrev");
        var $form = $("#followupForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#followupResponse").empty();
            $("#iperror").empty();
            $("#iverror").empty();


            var vdate = $.trim($(".v_date").val());
            var vrec = $.trim($("#rec_officers").val());


            if(vdate.length == 0){

                $("#v_error").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
            if(vrec.length == 0){
                $("#recofficererror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }


            if(vdate.length != 0 && vrec.length != 0){

                $("#savePrev").attr("disabled", "disabled");
                $("#fu_wait").css("display","block");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveFollowup.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="fail"){

                            $('#followupResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Recommendations and Follow-up Action Failed To Save.</span></div><br>").hide().fadeIn(1000);
                            $("#fu_wait").css("display","none");
                            $("#savePrev").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#followupResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Recommendations and Follow-up Action Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#fu_wait").css("display","none");
                            $("#savePrev").removeAttr('disabled');
                        }

                    }
                });
                return false;
            }
        });

    });


    //Save Access Service
    $(function () {

        var $buttons = $("#saveAService");
        var $form = $("#accessServiceForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#asResponse").empty();
            if($("#accessServiceForm input:checkbox:checked").length > 0){

                $("html, body").animate({ scrollTop: $("#asResponse").position().top }, "slow");
                $("#saveAService").attr("disabled", "disabled");
                $("#aserv_wait").css("display","block");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveAccessServices.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="fail"){

                            $('#asResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Access Services Failed To Save.</span></div><br>").hide().fadeIn(1000);
                            $("#aserv_wait").css("display","none");
                            $("#saveAService").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#asResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Access Services Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#aserv_wait").css("display","none");
                            $("#saveAService").removeAttr('disabled');
                        }

                    }
                });
                return false;

            }else{

                alert("No option has been selected. Always remember to select an option before submitting.");

            }



        });

    });

    //Save Quality Service
    $(function () {

        var $buttons = $("#saveQService");
        var $form = $("#qualityServiceForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#qsResponse").empty();
            if($("#qualityServiceForm input:checkbox:checked").length > 0){

                $("html, body").animate({ scrollTop: $("#qsResponse").position().top }, "slow");
                $("#saveQService").attr("disabled", "disabled");
                $("#qserv_wait").css("display","block");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveQualityServices.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="fail"){

                            $('#qsResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Quality Services Failed To Save.</span></div><br>").hide().fadeIn(1000);
                            $("#qserv_wait").css("display","none");
                            $("#saveQService").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#qsResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Quality Services Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#qserv_wait").css("display","none");
                            $("#saveQService").removeAttr('disabled');
                        }

                    }
                });
                return false;

            }else{

                alert("No option has been selected. Always remember to select an option before submitting.");

            }



        });

    });

    //Save Utilisation Service
    $(function () {

        var $buttons = $("#saveUService");
        var $form = $("#utilServiceForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#usResponse").empty();
            if($("#utilServiceForm input:checkbox:checked").length > 0){

                $("html, body").animate({ scrollTop: $("#usResponse").position().top }, "slow");
                $("#saveUService").attr("disabled", "disabled");
                $("#userv_wait").css("display","block");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveUtilServices.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="fail"){

                            $('#usResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Utilisation Services Failed To Save.</span></div><br>").hide().fadeIn(1000);
                            $("#userv_wait").css("display","none");
                            $("#saveUService").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#usResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Utilisation Services Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#userv_wait").css("display","none");
                            $("#saveUService").removeAttr('disabled');
                        }

                    }
                });
                return false;

            }else{

                alert("No option has been selected. Always remember to select an option before submitting.");

            }



        });

    });

    //Save Enabling Environment
    $(function () {

        var $buttons = $("#EnabInt");
        var $form = $("#enabEnvForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#evResponse").empty();
            if($("#enabEnvForm input:checkbox:checked").length > 0){

                $("html, body").animate({ scrollTop: $("#evResponse").position().top }, "slow");
                $("#EnabInt").attr("disabled", "disabled");
                $("#ev_wait").css("display","block");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveEnablingEnv.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="fail"){

                            $('#evResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Enabling Environment Failed To Save.</span></div><br>").hide().fadeIn(1000);
                            $("#ev_wait").css("display","none");
                            $("#EnabInt").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#evResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Enabling Environment Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#ev_wait").css("display","none");
                            $("#EnabInt").removeAttr('disabled');
                        }

                    }
                });
                return false;

            }else{

                alert("No option has been selected. Always remember to select an option before submitting.");

            }



        });

    });

    //Save Statistic Record
    $(function () {

        var $buttons = $("#saveStatRec");
        var $form = $("#statRecForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#srResponse").empty();
            if($("#statRecForm input:checkbox:checked").length > 0){

                $("html, body").animate({ scrollTop: $("#srResponse").position().top }, "slow");
                $("#saveStatRec").attr("disabled", "disabled");
                $("#sr_wait").css("display","block");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveStatRecord.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="fail"){

                            $('#srResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Statistics and Records Failed To Save.</span></div><br>").hide().fadeIn(1000);
                            $("#sr_wait").css("display","none");
                            $("#saveStatRec").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#srResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Statistics and Records Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#sr_wait").css("display","none");
                            $("#saveStatRec").removeAttr('disabled');
                        }

                    }
                });
                return false;

            }else{

                alert("No option has been selected. Always remember to select an option before submitting.");

            }



        });

    });

    //colour row of access to services pink after check is selected
    $("input[type='checkbox']").click(function(){



        $('tr #aserv:checked').each(function(){

            $(this).closest('tr').css("background-color","pink");

        });

        $('tr #aserv:not(:checked)').each(function(){

            $(this).closest('tr').css("background-color","");

        });

    });

    //colour row of quality to services pink after check is selected
    $("input[type='checkbox']").click(function(){



        $('tr #qserv:checked').each(function(){

            $(this).closest('tr').css("background-color","pink");

        });

        $('tr #qserv:not(:checked)').each(function(){

            $(this).closest('tr').css("background-color","");

        });

    });

    //colour row of utilisation to services pink after check is selected
    $("input[type='checkbox']").click(function(){



        $('tr #userv:checked').each(function(){

            $(this).closest('tr').css("background-color","pink");

        });

        $('tr #userv:not(:checked)').each(function(){

            $(this).closest('tr').css("background-color","");

        });

    });

    //colour row of enabling pink after check is selected
    $("input[type='checkbox']").click(function(){



        $('tr #enab:checked').each(function(){

            $(this).closest('tr').css("background-color","pink");

        });

        $('tr #enab:not(:checked)').each(function(){

            $(this).closest('tr').css("background-color","");

        });

    });

    //colour row of enabling pink after check is selected
    $("input[type='checkbox']").click(function(){



        $('tr #statRec:checked').each(function(){

            $(this).closest('tr').css("background-color","pink");

        });

        $('tr #statRec:not(:checked)').each(function(){

            $(this).closest('tr').css("background-color","");

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

