<?php
require_once('../../classes/mysql.class.php');
require_once('../../classes/Pmv.class.php');
$page = "pmv";
$sub_page_name = "edit_pmv";

$chekLogin = new MySQL();
$chekLogin->checkLogin();

$pmvO = new Pmv();

if(isset($_GET['pmvid']) && !empty($_GET['pmvid'])){

    $plinkid = base64_decode($_GET['pmvid']);
    $_SESSION['hems_active_pmv'] = $plinkid;

    $sheetid = $pmvO->getSheetId($plinkid);
    $getVdetails = new MySQL();
    $getVdetails->Query("SELECT implementing_partners.name,implementing_partners.ip_code FROM pmv_sheet LEFT JOIN implementing_partners ON pmv_sheet.vendor = implementing_partners.ip_code WHERE pmv_sheet.id = $sheetid");
    $implprow = $getVdetails->Row();

}else{

    header('Location:pmv_upload_list.php');

}

if(isset($_SESSION['hems_active_pmv']) && !empty($_SESSION['hems_active_pmv']) && $_SESSION['hems_active_pmv'] > 0){

    $pmvid = $_SESSION['hems_active_pmv'];
    $getBackInfo = new MySQL();
    $getBackInfo->Query("SELECT * FROM pmv_light WHERE id = $pmvid");

}else{

    $_SESSION['hems_active_pmv'] = 0;
    $pmvid = $_SESSION['hems_active_pmv'];

}

$getPmvRecordset = new MySQL();
$getPmvRecordset->Query("SELECT * FROM pmv_light WHERE id = $pmvid");
$pmvRecordset = $getPmvRecordset->Row();

$getStaffMet = new MySQL();
$getStaffMet->Query("SELECT * FROM pmv_staff_met WHERE pmv_id = $pmvid");
$smcount = $getStaffMet->RowCount();

$getPri = new MySQL();
$getPri->Query("SELECT * FROM pmv_prog_ref_info WHERE pmv_id = $pmvid");
$pricount = $getPri->RowCount();

$getList = new MySQL();
$getList->Query("SELECT * FROM pmv_status_indicators WHERE pmv_id = $pmvid");
$indicount = $getList->RowCount();

$getHv = new MySQL();
$getHv->Query("SELECT * FROM pmv_hv_items WHERE pmv_id = $pmvid");
$itemcount = $getHv->RowCount();

$getListConst = new MySQL();
$getListConst->Query("SELECT * FROM pmv_constraints WHERE pmv_id = $pmvid");
$conscount = $getListConst->RowCount();

$getListFp = new MySQL();
$getListFp->Query("SELECT * FROM pmv_followup_actions WHERE pmv_id = $pmvid");
$fpcount = $getListFp->RowCount();

$getVendor = new MySQL();
$getVendor->Query("SELECT * FROM implementing_partners WHERE status = 'Active' ORDER BY name ASC");

$getStaff = new MySQL();
$getStaff->Query("SELECT * FROM staff_pdetail WHERE status = 'active'");

$getOffs = new MySQL();
$getOffs->Query("SELECT * FROM pmv_officers LEFT JOIN staff_pdetail ON pmv_officers.staff_id = staff_pdetail.empID WHERE pmv_id = $pmvid");
$offcount = $getOffs->RowCount();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:56:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>HEMS | Edit PMV</title>
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
            <li class="active">Edit PMV</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">PMV <small>edit PMV...</small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-md-12 col-xs-6">
                <!-- begin panel -->
                <div class="panel panel-default" data-sortable-id="form-stuff-1">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
<!--                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>-->
<!--                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>-->
<!--                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>-->
<!--                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>-->
                            <input style="float:right" type="submit" name="submitPmv" id="submitPmv" class="btn btn-primary btn-sm" value="Submit PMV">
                        </div>
                        <h4 class="panel-title">Edit PMV</h4>
                        <div id="submitResponse"></div>
                        <div>
                            <p align="center" style="display: none; color: limegreen;" id="submit_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                        <div class="row">
                            <div class="alert alert-info">
                                <strong>Decline Reason&nbsp;:&nbsp;</strong><?php echo $pmvRecordset->decline_comment;?>
                            </div>
                        </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#default-tab-1" data-toggle="tab"><h4>Section A</h4></a></li>
                                <li class=""><a href="#default-tab-2" data-toggle="tab"><h4>Section B</h4></a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="default-tab-1">
                            <!--Background info panel begin -->
                            <div class="panel panel-primary">
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
                                                <tr>
                                                    <td class="col-lg-1"><label>Date of Visit<font style="color: red">*</font>:</label></td>
                                                    <td  colspan="3" class="col-lg-3">
                                                        <div>
                                                            <div class="input-group input-daterange">
                                                                <input type="text" class="form-control" name="start" id="start" placeholder="Date Start" value="<?php if(is_object($pmvRecordset)){echo $pmvRecordset->start_date;}?>"/><span id="starterror"></span>
                                                                <span class="input-group-addon">to</span>
                                                                <input type="text" class="form-control" name="end" id="end" placeholder="Date End" value="<?php if(is_object($pmvRecordset)){echo $pmvRecordset->end_date;}?>"/>
                                                                <span id="enderror"></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-2"><label>Objectives<font style="color: red">*</font>:</label></td>
                                                    <td class="col-lg-4"><textarea class="form-control" name="objectives" id="objectives"><?php if(is_object($pmvRecordset)){echo $pmvRecordset->objectives;}?></textarea><span id="objerror"></span></td>

                                                    <td class="col-lg-2"><label>Partner Name:</label></td>
                                                    <td class="col-lg-4"><strong><?php echo $implprow->name;?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-2"><label>Outputs<font style="color: red">*</font>:</label></td>
                                                    <td class="col-lg-4"><textarea class="form-control" name="outputs" id="outputs"><?php if(is_object($pmvRecordset)){echo $pmvRecordset->outputs;}?></textarea><span id="outerror"></span></td>

                                                    <td class="col-lg-2"><label>Total Cash Contribution Of Programmes<font style="color: red">*</font>:</label></td>
                                                    <td class="col-lg-4"><input type="text" class="form-control" name="cash_contri" id="cash_contri" onkeypress="return isNumberKey(event)" value="<?php if(is_object($pmvRecordset)){echo $pmvRecordset->total_cash_contrib;}?>"><span id="contrierror"></span></td>

                                                </tr>
                                                <tr>
                                                    <td class="col-lg-2"><label>Supplies Already Provided As Part Of Program<font style="color: red">*</font>:</label></td>
                                                    <td class="col-lg-4"><input type="text" class="form-control" name="supplies" id="supplies" value="<?php if(is_object($pmvRecordset)){echo $pmvRecordset->supplies;}?>"><span id="suplerror"></span></td>

                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12"><div class="alert alert-info" style="text-align: center;"><h5>Progress Reporting</h5></div></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-2"><label>Access To Inputs/Services<font style="color: red">*</font>:</label></td>
                                                    <td colspan="3" class="col-lg-10"><textarea class="form-control" name="access_input_serv" id="access_input_serv"><?php if(is_object($pmvRecordset)){echo $pmvRecordset->access_serv;}?></textarea><span id="aiserror"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-2"><label>Quality To Inputs/Services<font style="color: red">*</font>:</label></td>
                                                    <td colspan="3" class="col-lg-10"><textarea class="form-control" name="qual_input_serv" id="qual_input_serv"><?php if(is_object($pmvRecordset)){echo $pmvRecordset->quality_serv;}?></textarea><span id="qiserror"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-2"><label>Utilisation To Inputs/Services<font style="color: red">*</font>:</label></td>
                                                    <td colspan="3" class="col-lg-10"><textarea class="form-control" name="util_input_serv" id="util_input_serv"><?php if(is_object($pmvRecordset)){echo $pmvRecordset->util_serv;}?></textarea><span id="uiserror"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-2"><label>Enabling Environment<font style="color: red">*</font>:</label></td>
                                                    <td colspan="3" class="col-lg-10"><textarea class="form-control" name="enab_environ" id="enab_environ"><?php if(is_object($pmvRecordset)){echo $pmvRecordset->enabling_environ;}?></textarea><span id="eeerror"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-2"><label>Overall assessment of the extent to which the programme is progressing in relation to the expected results for the year<font style="color: red">*</font>:</label></td>
                                                    <td colspan="3" class="col-lg-10"><textarea class="form-control" name="assessment" id="assessment"><?php if(is_object($pmvRecordset)){echo $pmvRecordset->overall_assess;}?></textarea><span id="asserror"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-2"><label>Outstanding related concerns from the tracking sheet or previous PMV <font style="color: red">*</font>:</label></td>
                                                    <td colspan="3" class="col-lg-10"><textarea class="form-control" name="outstanding" id="outstanding"><?php if(is_object($pmvRecordset)){echo $pmvRecordset->outstand_related;}?></textarea><span id="outerror"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="col-lg-2"><label>Other issues/concerns <font style="color: red">*</font>:</label></td>
                                                    <td colspan="3" class="col-lg-10"><textarea class="form-control" name="issues_concerns" id="issues_concerns"><?php if(is_object($pmvRecordset)){echo $pmvRecordset->other_issues;}?></textarea><span id="icerror"></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12"><input style="float:right;" class="btn btn-sm btn-success" type="submit" name="saveBackground" id="saveBackground" value="Save Section A"></td>
                                                </tr>
                                            </table>
                                            <input type="hidden" name="sheet_id" value="<?php echo $sheetid;?>">
                                            <input type="hidden" name="vendor" value="<?php echo $implprow->ip_code;?>">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Background info panel end -->
                                    </div>
                                <div class="tab-pane fade in" id="default-tab-2">
                            <!--section a begin -->
                            <div class="panel panel-primary" data-sortable-id="form-stuff-2">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Section B</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div id="sectionaResponse"></div>
                                        <div>
                                            <p align="center" style="display: none; color: limegreen;" id="sa_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                        </div>

                                        <form method="post" action="" id="staffmetForm">
                                            <table class="table table-responsive">
                                                <tbody>
                                                <tr>
                                                    <td colspan="5"><div id="smResponse"></div>
                                                        <div>
                                                            <p align="center" style="display: none; color: limegreen;" id="sm_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                                        </div></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"><div class="alert alert-info" style="text-align: center;"><h5>Partner Staff Met During Visit</h5></div></td>
                                                </tr>
                                                <tr>
                                                    <td><h5>Name</h5></td>
                                                    <td><h5>Title</h5></td>
                                                    <td><h5>Contact Number</h5></td>
                                                    <td><h5>Email</h5></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="off_name" id="off_name" class="form-control"><span id="onameerror"></span></td>
                                                    <td><input type="text" name="title" id="title" class="form-control"><span id="titleerror"></span></td>
                                                    <td><input type="text" name="cnum" id="cnum" class="form-control"><span id="cnumerror"></span></td>
                                                    <td><input type="text" name="email" id="email" class="form-control"><span id="semailerror"></span></td>
                                                    <td><input type="submit" name="savePstaff" id="savePstaff" value="Save" class="btn btn-success btn-sm"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                        <div id="smetlist">
                                            <?php if($smcount){?>
                                                <table class="table table-bordered table-responsive table-striped">
                                                    <thead>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td>Title</td>
                                                        <td>Contact Number</td>
                                                        <td>Email</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php  while(!$getStaffMet->EndOfSeek()){$listItemConst = $getStaffMet->Row();?>
                                                        <tr>
                                                            <td><?php echo $listItemConst->name;?></td>
                                                            <td><?php echo $listItemConst->title;?></td>
                                                            <td><?php echo $listItemConst->contact_number;?></td>
                                                            <td><?php echo $listItemConst->email;?></td>
                                                            <td><a id="del_pstaff" href="" name="<?php echo $listItemConst->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </div>
                                        </div>

                                    <form method="post" action="" id="movForm">
                                        <table class="table table-responsive">
                                            <tbody>
                                            <tr>
                                                <td colspan="5"><div id="priResponse"></div>
                                                    <div>
                                                        <p align="center" style="display: none; color: limegreen;" id="pri_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><div class="alert alert-info" style="text-align: center;"><h5>Programme Reference Information</h5></div></td>
                                            </tr>
                                            <tr>
                                                <td><h5>Indicator</h5></td>
                                                <td><h5>Baseline</h5></td>
                                                <td><h5>Target</h5></td>
                                                <td><h5>Method Of Verification</h5></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="indic" id="indic" class="form-control"><span id="indicerror"></span></td>
                                                <td><input type="text" name="baseline" id="baseline" class="form-control"><span id="blerror"></span></td>
                                                <td><input type="text" name="target" id="target" class="form-control"><span id="targerror"></span></td>
                                                <td><input type="text" name="mov" id="mov" class="form-control"><span id="moverror"></span></td>
                                                <td><input type="submit" name="savePri" id="savePri" value="Save" class="btn btn-success btn-sm"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <div id="prilist">
                                        <?php if($pricount){?>
                                            <table class="table table-bordered table-responsive table-striped">
                                                <thead>
                                                <tr>
                                                    <td>Indicator</td>
                                                    <td>Baseline</td>
                                                    <td>Target</td>
                                                    <td>Method Of Verification</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php  while(!$getPri->EndOfSeek()){$listPri = $getPri->Row();?>
                                                    <tr>
                                                        <td><?php echo $listPri->indicator;?></td>
                                                        <td><?php echo $listPri->baseline;?></td>
                                                        <td><?php echo $listPri->target;?></td>
                                                        <td><?php echo $listPri->mov;?></td>
                                                        <td><a id="del_pri" href="" name="<?php echo $listPri->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>

                                    <form method="post" action="" id="statusIndicForm">
                                        <table class="table table-responsive">
                                            <tbody>
                                            <tr>
                                                <td colspan="3"><div id="siResponse"></div>
                                                    <div>
                                                        <p align="center" style="display: none; color: limegreen;" id="si_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><div class="alert alert-info" style="text-align: center;"><h5>B. Status of Indicators</h5></div></td>
                                            </tr>
                                            <tr>
                                                <td><h5>Indicators (Baselines and Targets)</h5></td>
                                                <td><h5>Progress on Indicators/Targets</h5></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><textarea name="indicators" id="indicators" class="form-control"></textarea><span id="indierror"></span></td>
                                                <td><textarea name="progress" id="progress" class="form-control"></textarea><span id="prgerror"></span></td>
                                                <td><input type="submit" name="saveIndi" id="saveIndi" value="Save Indicator" class="btn btn-success btn-sm"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <div id="indilist">
                                        <?php if($indicount){?>
                                            <table class="table table-bordered table-responsive table-striped">
                                                <thead>
                                                <tr>
                                                    <td>Indicators</td>
                                                    <td>Progress</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php  while(!$getList->EndOfSeek()){$listItem = $getList->Row();?>
                                                    <tr>
                                                        <td><?php echo $listItem->indicators;?></td>
                                                        <td><?php echo $listItem->progress;?></td>
                                                        <td><a id="del_si" href="" name="<?php echo $listItem->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>
                                    <form method="post" action="" id="hvForm">
                                        <table class="table table-responsive">
                                            <tbody>
                                            <tr>
                                                <td colspan="5"><div id="hvResponse"></div>
                                                    <div>
                                                        <p align="center" style="display: none; color: limegreen;" id="hv_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"><div class="alert alert-info" style="text-align: center;"><h5>Status Of High Value Items</h5></div></td>
                                            </tr>
                                            <tr>
                                                <td><h5>Item Description</h5></td>
                                                <td><h5>Quantity</h5></td>
                                                <td><h5>Location</h5></td>
                                                <td><h5>Condition</h5></td>
                                                <td><h5>Remarks</h5></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="item_desc" id="item_desc" class="form-control"><span id="idescerror"></span></td>
                                                <td><input type="text" name="quantity" id="quantity" class="form-control"><span id="quanterror"></span></td>
                                                <td><input type="text" name="location" id="location" class="form-control"><span id="locerror"></span></td>
                                                <td><select id="condition" name="condition" class="form-control">
                                                        <option disabled selected>--SELECT--</option>
                                                        <option value="average">Average</option>
                                                        <option value="excellent">Excellent</option>
                                                        <option value="good">Good</option>
                                                        <option value="poor">Poor</option>
                                                        <option value="unusable">Unusable</option>
                                                </select><span id="conderror"></span></td>
                                                <td><textarea  name="remarks" id="remarks" class="form-control"></textarea><span id="remerror"></span></td>
                                                <td><input type="submit" name="saveItem" id="saveItem" value="Save" class="btn btn-success btn-sm"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <div id="hvlist">
                                        <?php if($itemcount){?>
                                            <table class="table table-bordered table-responsive table-striped">
                                                <thead>
                                                <tr>
                                                    <td>Item Description</td>
                                                    <td>Quantity</td>
                                                    <td>Location</td>
                                                    <td>Condition</td>
                                                    <td>Remarks</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php  while(!$getHv->EndOfSeek()){$listHv = $getHv->Row();?>
                                                    <tr>
                                                        <td><?php echo $listHv->item_desc;?></td>
                                                        <td><?php echo $listHv->quantity;?></td>
                                                        <td><?php echo $listHv->location;?></td>
                                                        <td><?php echo $listHv->condition;?></td>
                                                        <td><?php echo $listHv->remarks;?></td>
                                                        <td><a id="del_hvi" href="" name="<?php echo $listHv->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>
                                    <form method="post" action="" id="constForm">
                                        <table class="table table-responsive">
                                            <tbody>
                                            <tr>
                                                <td colspan="4"><div id="conResponse"></div>
                                                    <div>
                                                        <p align="center" style="display: none; color: limegreen;" id="con_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"><div class="alert alert-info" style="text-align: center;"><h5> Constraints/Challenges/Opportunities- (Related to this Project/intervention implementation and achievement of results)</h5></div></td>
                                            </tr>
                                            <tr>
                                                <td><h5>Constraints/Challenges</h5></td>
                                                <td><h5>Lessons Learned</h5></td>
                                                <td><h5>Opportunities</h5></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><textarea name="constraints" id="constraints" class="form-control"></textarea><span id="conerror"></span></td>
                                                <td><textarea name="less_learned" id="less_learned" class="form-control"></textarea><span id="llerror"></span></td>
                                                <td><textarea name="opportunity" id="opportunity" class="form-control"></textarea><span id="oppoerror"></span></td>
                                                <td><input type="submit" name="saveConst" id="saveConst" value="Save Constraint" class="btn btn-success btn-sm"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>

                                    <div id="conslist">
                                        <?php if($conscount){?>
                                            <table class="table table-bordered table-responsive table-striped">
                                                <thead>
                                                <tr>
                                                    <td>Constraints</td>
                                                    <td>Lessons Learned</td>
                                                    <td>Opportunity</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php  while(!$getListConst->EndOfSeek()){$listItemConst = $getListConst->Row();?>
                                                    <tr>
                                                        <td><?php echo $listItemConst->constraint;?></td>
                                                        <td><?php echo $listItemConst->lesson_learned;?></td>
                                                        <td><?php echo $listItemConst->opportunity;?></td>
                                                        <td><a id="del_cons" href="" name="<?php echo $listItemConst->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>
                                    <form method="post" action="" id="followPlanForm">
                                        <table class="table table-responsive">
                                            <tbody>
                                            <tr>
                                                <td colspan="5"><div id="fpResponse"></div>
                                                    <div>
                                                        <p align="center" style="display: none; color: limegreen;" id="fp_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><div class="alert alert-info" style="text-align: center;"><h5>Recommendations</h5></div></td>
                                            </tr>
                                            <tr>
                                                <td><h5>Findings</h5></td>
                                                <td><h5>Recommended Action</h5></td>
                                                <td><h5>By Whom</h5></td>
                                                <td><h5>By When</h5></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><textarea name="findings" id="findings" class="form-control"></textarea><span id="fnderror"></span></td>
                                                <td><textarea name="recact" id="recact" class="form-control"></textarea><span id="raerror"></span></td>
                                                <td><input type="text" name="by_whom" id="by_whom" class="form-control"><span id="bwhomerror"></span></td>
                                                <td><input type="text" name="by_when" id="by_when" class="form-control"><span id="bwhenerror"></span></td>
                                                <td><input type="submit" name="saveFp" id="saveFp" value="Save" class="btn btn-success btn-sm"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <div id="fplist">
                                        <?php if($fpcount){?>
                                            <table class="table table-bordered table-responsive table-striped">
                                                <thead>
                                                <tr>
                                                    <td>Findings</td>
                                                    <td>Recommended Action</td>
                                                    <td>By Whom</td>
                                                    <td>By When</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php while(!$getListFp->EndOfSeek()){$listItemFp = $getListFp->Row();?>
                                                    <tr>
                                                        <td><?php echo $listItemFp->findings;?></td>
                                                        <td><?php echo $listItemFp->recomm_action;?></td>
                                                        <td><?php echo $listItemFp->by_whom;?></td>
                                                        <td><?php echo $listItemFp->by_when;?></td>
                                                        <td><a id="del_rec" href="" name="<?php echo $listItemFp->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>
                                    <form method="post" action="" id="staffSignForm">
                                <table class="table table-responsive">
                                    <tr>
                                        <td colspan="5"><div id="offResponse"></div>
                                            <div>
                                                <p align="center" style="display: none; color: limegreen;" id="off_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                            </div></td>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-2"><label>Staff Member Sign Off<font style="color: red">*</font>:</label></td>
                                        <td class="col-lg-9">
                                            <select class="multiple-select2 form-control" style="width: 700px;" multiple="multiple" name="officers[]" id="officers">
                                                <?php while(!$getStaff->EndOfSeek()){$stfRow = $getStaff->Row();?>
                                                    <option value="<?php echo $stfRow->empID;?>"><?php echo $stfRow->first_name.' '.$stfRow->last_name;?></option>
                                                <?php } ?>
                                            </select><span id="officererror"></span>
                                        </td>
                                        <td class="col-lg-1"><input type="submit" name="saveStaffSign" id="saveStaffSign" value="Save Staff" class="btn btn-primary btn-sm"></td>
                                    </tr>
                                </table>
                                        </form>
                                    <div id="offlist">
                                        <?php if($offcount){?>
                                            <table class="table table-bordered table-responsive table-striped" align="center" style="width:500px;">
                                                <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Name</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $countit = 1; while(!$getOffs->EndOfSeek()){$listOffs = $getOffs->Row();?>
                                                    <tr>
                                                        <td><?php echo $countit;?></td>
                                                        <td><?php echo $listOffs->first_name.' '.$listOffs->last_name;?></td>
                                                    </tr>
                                                <?php $countit++; } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>
                                    </div>
                                </div>
                            <!--section a end -->
                                    </div><!--tab 2 end -->





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

<script type="text/javascript">

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
        $("#starterror").empty();
        $("#enderror").empty();
        $("#outerror").empty();
        $("#objerror").empty();
        $("#contrierror").empty();
        $("#suplerror").empty();
        $("#aiserror").empty();
        $("#qiserror").empty();
        $("#uiserror").empty();
        $("#eeerror").empty();
        $("#asserror").empty();
        $("#icerror").empty();
        $("#outerror").empty();

        var obj = $.trim($("#objectives").val());
        var vstart = $.trim($("#start").val());
        var vend = $.trim($("#end").val());
        var output = $.trim($("#outputs").val());
        var contri = $.trim($("#cash_contri").val());
        var supl = $.trim($("#supplies").val());
        var ais = $.trim($("#access_input_serv").val());
        var qis = $.trim($("#qual_input_serv").val());
        var uis = $.trim($("#util_input_serv").val());
        var ee = $.trim($("#enab_environ").val());
        var ass = $.trim($("#assessment").val());
        var out = $.trim($("#outstanding").val());
        var ic = $.trim($("#issues_concerns").val());

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
        if(output.length == 0){
            $("#outerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        if(contri.length == 0){
            $("#contrierror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        if(supl.length == 0){
            $("#suplerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        if(ais.length == 0){
            $("#aiserror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        if(qis.length == 0){
            $("#qiserror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        if(uis.length == 0){
            $("#uiserror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        if(ee.length == 0){
            $("#eeerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        if(ass.length == 0){
            $("#asserror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        if(ic.length == 0){
            $("#icerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        if(out.length == 0){
            $("#outerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }

        if(obj.length != 0 && vstart.length != 0 && vend.length != 0 && output.length != 0 && contri.length != 0 && supl.length != 0 && ais.length != 0 && qis.length != 0 && uis.length != 0 && ee.length != 0 && ass.length != 0 && ic.length != 0 && out.length != 0){

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

//Save Staff Met
$(function () {

    var $buttons = $("#savePstaff");
    var $form = $("#staffmetForm");

    $buttons.click(function (e) {

        e.preventDefault();
        $("#sectionaResponse").empty();
        $("#onameerror").empty();
        $("#titleerror").empty();
        $("#cnumerror").empty();
        $("#semailerror").empty();


        var on = $.trim($("#off_name").val());
        var title = $.trim($("#title").val());
        var cnum = $.trim($("#cnum").val());
        var email = $.trim($("#email").val());


        if(on.length == 0){

            $("#onameerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        if(title.length == 0){
            $("#titleerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        if(cnum.length == 0){
            $("#cnumerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }
        if(email.length == 0){
            $("#semailerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }


        if(on.length != 0 && title.length != 0 && cnum.length != 0 && email.length != 0){

            $("#savePstaff").attr("disabled", "disabled");
            $("#sm_wait").css("display","block");
            $("html, body").animate({ scrollTop: 0 }, "slow");

            $.ajax({
                type: "POST",
                url: "../../controllers/project/saveOfficerMet.php",
                data: $form.serialize(),
                success: function(e) {

                    if(e=="fail"){

                        $('#smResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Staff Met To Save.</span></div><br>").hide().fadeIn(1000);
                        $("#sm_wait").css("display","none");
                        $("#savePstaff").removeAttr('disabled');

                    }else{

                        $('#smResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Staff Met Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                        $('#smetlist').html(e);
                        $("#off_name").val("");
                        $("#title").val("");
                        $("#cnum").val("");
                        $("#email").val("");
                        $("#sm_wait").css("display","none");
                        $("#savePstaff").removeAttr('disabled');
                    }

                }
            });
            return false;
        }
    });

});

//Delete Staff Met
$(document).on("click","#del_pstaff",function(e){
    e.preventDefault();
    var smet = $(this).attr('name');
    $("#sm_wait").css("display","block");
    $.ajax({
        type: "POST",
        url: "../../controllers/project/deleteOfficerMet.php",
        data: {smet : smet
        },
        success:function(sm) {

            $("#sm_wait").css("display","none");
            $('#smetlist').html(sm);

        }

    });
});


//Save Pri
$(function () {

    var $buttons = $("#savePri");
    var $form = $("#movForm");

    $buttons.click(function (e) {

        e.preventDefault();
        $("#priResponse").empty();
        $("#indicerror").empty();
        $("#blerror").empty();
        $("#targerror").empty();
        $("#moverror").empty();


        var indic = $.trim($("#indic").val());
        var bl = $.trim($("#baseline").val());
        var targ = $.trim($("#target").val());
        var mov = $.trim($("#mov").val());


        if(indic.length == 0){

            $("#indicerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');

        }
        if(bl.length == 0){

            $("#blerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');

        }
        if(targ.length == 0){

            $("#targerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');

        }
        if(mov.length == 0){

            $("#moverror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');

        }


        if(indic.length != 0 && bl.length != 0 && targ.length != 0 && mov.length != 0){

            $("#savePri").attr("disabled", "disabled");
            $("#pri_wait").css("display","block");


            $.ajax({
                type: "POST",
                url: "../../controllers/project/saveProgramRefInfo.php",
                data: $form.serialize(),
                success: function(e) {

                    if(e=="fail"){

                        $('#priResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Programme Reference Information Failed To Save.</span></div><br>").hide().fadeIn(1000);
                        $("#pri_wait").css("display","none");
                        $("#savePri").removeAttr('disabled');

                    }else{

                        $('#priResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Programme Reference Information Added Successfully.</span></div><br>").hide().fadeIn(1000);
                        $('#prilist').html(e);
                        $("#pri_wait").css("display","none");
                        $("#indic").val("");
                        $("#baseline").val("");
                        $("#target").val("");
                        $("#mov").val("");
                        $("#savePri").removeAttr('disabled');
                    }

                }
            });
            return false;
        }
    });

});

//Delete Program reference information
$(document).on("click","#del_pri",function(e){
    e.preventDefault();
    var pri = $(this).attr('name');
    $("#pri_wait").css("display","block");
    $.ajax({
        type: "POST",
        url: "../../controllers/project/deleteProgramRefInfo.php",
        data: {pri : pri
        },
        success:function(sm) {

            $("#pri_wait").css("display","none");
            $('#prilist').html(sm);

        }

    });
});


//Save High Value Items
$(function () {

    var $buttons = $("#saveItem");
    var $form = $("#hvForm");

    $buttons.click(function (e) {

        e.preventDefault();
        $("#hvResponse").empty();
        $("#idescerror").empty();
        $("#quanterror").empty();
        $("#locerror").empty();
        $("#conderror").empty();
        $("#remerror").empty();


        var itdesc = $.trim($("#item_desc").val());
        var loc = $.trim($("#location").val());
        var quant = $.trim($("#quantity").val());
        var cond = $.trim($("#condition").val());
        var rem = $.trim($("#remarks").val());


        if(itdesc.length == 0){

            $("#idescerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');

        }
        if(loc.length == 0){

            $("#quanterror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');

        }
        if(quant.length == 0){

            $("#locerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');

        }
        if(cond.length == 0){

            $("#conderror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');

        }
        if(rem.length == 0){

            $("#remerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');

        }


        if(itdesc.length != 0 && loc.length != 0 && quant.length != 0 && cond.length != 0 && rem.length != 0){

            $("#saveItem").attr("disabled", "disabled");
            $("#hv_wait").css("display","block");


            $.ajax({
                type: "POST",
                url: "../../controllers/project/saveHighValueItems.php",
                data: $form.serialize(),
                success: function(e) {

                    if(e=="fail"){

                        $('#hvResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>High Value Item Failed.</span></div><br>").hide().fadeIn(1000);
                        $("#hv_wait").css("display","none");
                        $("#saveItem").removeAttr('disabled');

                    }else{

                        $('#hvResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>High Value Item Added Successfully.</span></div><br>").hide().fadeIn(1000);
                        $('#hvlist').html(e);
                        $("#hv_wait").css("display","none");
                        $("#item_desc").val("");
                        $("#location").val("");
                        $("#quantity").val("");
                        $("#condition").val("");
                        $("#remarks").val("");
                        $("#saveItem").removeAttr('disabled');
                    }

                }
            });
            return false;
        }
    });

});

//Delete High Value Items
$(document).on("click","#del_hvi",function(e){
    e.preventDefault();
    var hvi = $(this).attr('name');
    $("#hv_wait").css("display","block");
    $.ajax({
        type: "POST",
        url: "../../controllers/project/deleteHighValueItems.php",
        data: {hvi : hvi
        },
        success:function(sm) {

            $("#hv_wait").css("display","none");
            $('#hvlist').html(sm);

        }

    });
});


    //Save PMV status of indicators
    $(function () {

        var $buttons = $("#saveIndi");
        var $form = $("#statusIndicForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#siResponse").empty();
            $("#prgerror").empty();
            $("#indierror").empty();

            var prg = $.trim($("#progress").val());
            var indi = $.trim($("#indicators").val());

            if(prg.length == 0){

                $("#prgerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(indi.length == 0){

                $("#indierror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(prg.length != 0 && indi.length != 0){

                $("#saveIndi").attr("disabled", "disabled");
                $("#si_wait").css("display","block");
                $("html, body").animate({ scrollTop: $("#siResponse").position().top }, "slow");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveStatusIndicator.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="fail"){

                            $('#siResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Progress Reporting Failed To Save.</span></div><br>").hide().fadeIn(1000);
                            $("#si_wait").css("display","none");
                            $("#saveIndi").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#siResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Progress Reporting Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#si_wait").css("display","none");
                            $("#saveIndi").removeAttr('disabled');

                        }else{
                            $('#siResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Progress Reporting Saved Successfully.</span></div><br>").hide().fadeIn(1000);

                            $("#si_wait").css("display","none");
                            $("#saveIndi").removeAttr('disabled');
                            $("#indicators").val("");
                            $("#progress").val("");
                            $('#indilist').html(e);

                        }

                    }
                });
                return false;
            }
        });

    });

//Delete Status of indicators
$(document).on("click","#del_si",function(e){
    e.preventDefault();
    var si = $(this).attr('name');
    $("#si_wait").css("display","block");
    $.ajax({
        type: "POST",
        url: "../../controllers/project/deleteStatusIndicator.php",
        data: {si : si },
        success:function(sm) {

            $("#si_wait").css("display","none");
            $('#indilist').html(sm);

        }

    });
});


    //Save PMV constraints
    $(function () {

        var $buttons = $("#saveConst");
        var $form = $("#constForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#conResponse").empty();
            $("#oppoerror").empty();
            $("#llerror").empty();
            $("#conerror").empty();

            var con = $.trim($("#constraints").val());
            var oppo = $.trim($("#opportunity").val());
            var ll = $.trim($("#less_learned").val());

            if(con.length == 0){

                $("#conerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(oppo.length == 0){

                $("#oppoerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(ll.length == 0){

                $("#llerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(con.length != 0 && oppo.length != 0 && ll.length != 0){

                $("#saveConst").attr("disabled", "disabled");
                $("#con_wait").css("display","block");
                $("html, body").animate({ scrollTop: $("#conResponse").position().top }, "slow");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveConstraint.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="fail"){

                            $('#conResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Constraint Failed To Save.</span></div><br>").hide().fadeIn(1000);
                            $("#con_wait").css("display","none");
                            $("#saveConst").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#conResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Constraint Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#con_wait").css("display","none");
                            $("#saveConst").removeAttr('disabled');

                        }else{
                            $('#conResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Constraint Saved Successfully.</span></div><br>").hide().fadeIn(1000);

                            $("#con_wait").css("display","none");
                            $("#saveConst").removeAttr('disabled');
                            $("#constraints").val("");
                            $("#opportunity").val("");
                            $("#less_learned").val("");
                            $('#conslist').html(e);

                        }

                    }
                });
                return false;
            }
        });

    });

//Delete Constraints
$(document).on("click","#del_cons",function(e){
    e.preventDefault();
    var con = $(this).attr('name');
    $("#con_wait").css("display","block");
    $.ajax({
        type: "POST",
        url: "../../controllers/project/deleteConstraint.php",
        data: {con : con },
        success:function(sm) {

            $("#con_wait").css("display","none");
            $('#conslist').html(sm);

        }

    });
});



//Save PMV recommendation
    $(function () {

        var $buttons = $("#saveReco");
        var $form = $("#reccForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#rcResponse").empty();
            $("#rnerror").empty();
            $("#rderror").empty();

            var rn = $.trim($("#recname").val());
            var rd = $.trim($("#recdesc").val());


            if(rn.length == 0){

                $("#rnerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(rd.length == 0){

                $("#rderror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(rn.length != 0 && rd.length != 0){

                $("#saveReco").attr("disabled", "disabled");
                $("#rc_wait").css("display","block");
                $("html, body").animate({ scrollTop: $("#rcResponse").position().top }, "slow");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveRecommendation.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="fail"){

                            $('#rcResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Recommendation Failed To Save.</span></div><br>").hide().fadeIn(1000);
                            $("#rc_wait").css("display","none");
                            $("#saveReco").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#rcResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Recommendation Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#rc_wait").css("display","none");
                            $("#saveReco").removeAttr('disabled');

                        }else{
                            $('#rcResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Recommendation Saved Successfully.</span></div><br>").hide().fadeIn(1000);

                            $("#rc_wait").css("display","none");
                            $("#saveReco").removeAttr('disabled');
                            $("#recname").val("");
                            $("#recdesc").val("");
                            $('#recommlist').html(e);

                        }

                    }
                });
                return false;
            }
        });

    });
//Delete Recommendation
$(document).on("click","#del_rec",function(e){
    e.preventDefault();
    var rec = $(this).attr('name');
    $("#fp_wait").css("display","block");
    $.ajax({
        type: "POST",
        url: "../../controllers/project/deleteFollowAction.php",
        data: {rec : rec },
        success:function(sm) {

            $("#fp_wait").css("display","none");
            $('#fplist').html(sm);

        }

    });
});


    //Save PMV follow up and planned actions
    $(function () {

        var $buttons = $("#saveFp");
        var $form = $("#followPlanForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#fpResponse").empty();
            $("#fnderror").empty();
            $("#raerror").empty();
            $("#bwhomerror").empty();
            $("#bwhenerror").empty();

            var fnds = $.trim($("#findings").val());
            var ra = $.trim($("#recact").val());
            var bwhom = $.trim($("#by_whom").val());
            var bwhen = $.trim($("#by_when").val());


            if(fnds.length == 0){

                $("#fnderror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(ra.length == 0){

                $("#raerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(bwhom.length == 0){

                $("#bwhomerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(bwhen.length == 0){

                $("#bwhenerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }

            if(fnds.length != 0 && ra.length != 0 && bwhom.length != 0 && bwhen.length != 0){

                $("#saveFp").attr("disabled", "disabled");
                $("#fp_wait").css("display","block");
                $("html, body").animate({ scrollTop: $("#fpResponse").position().top }, "slow");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveFollowAction.php",
                    data: $form.serialize(),
                    success: function(e) {

                        if(e=="fail"){

                            $('#fpResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Follow up/Planned Actions Failed To Save.</span></div><br>").hide().fadeIn(1000);
                            $("#fp_wait").css("display","none");
                            $("#saveFp").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#fpResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Follow up/Planned Actions Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#fp_wait").css("display","none");
                            $("#saveFp").removeAttr('disabled');

                        }else{
                            $('#fpResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Follow up/Planned Actions Saved Successfully.</span></div><br>").hide().fadeIn(1000);

                            $("#fp_wait").css("display","none");
                            $("#saveFp").removeAttr('disabled');
                            $("#findings").val("");
                            $("#recact").val("");
                            $("#by_whom").val("");
                            $("#by_when").val("");
                            $('#fplist').html(e);

                        }

                    }
                });
                return false;
            }
        });

    });

    //Submit pmv
    $(function () {

        var $buttons = $("#submitPmv");
        var $action = "submitThisForm";

        $buttons.click(function (e) {

            e.preventDefault();
            $("#submitResponse").empty();

            var conf = confirm("Are you sure you want to finally submit this PMV form?")

            if(conf){
                $("#submitPmv").attr("disabled", "disabled");
                $("#submit_wait").css("display","block");
                $("html, body").animate({ scrollTop: $("#submitResponse").position().top }, "slow");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/saveSubmission.php",
                    data: {whatToDo:$action},
                    success: function(e) {

                        if(e=="fail"){

                            $('#submitResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>PMV submission failed.</span></div><br>").hide().fadeIn(1000);
                            $("#submit_wait").css("display","none");
                            $("#submitPmv").removeAttr('disabled');

                        }else if(e=="zero"){

                            $('#submitResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>PMV submission failed. Fill out PMV before submitting.</span></div><br>").hide().fadeIn(1000);
                            $("#submit_wait").css("display","none");
                            $("#submitPmv").removeAttr('disabled');

                        }else if(e=="ok"){

                            $('#submitResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>PMV Submitted Successfully.</span></div><br>").hide().fadeIn(1000);
                            $("#submit_wait").css("display","none");
                            $("#submitPmv").removeAttr('disabled');

                        }
                    }
                });
                return false;
            }
        });

    });



//Save Staff Signoff
$(function () {

    var $buttons = $("#saveStaffSign");
    var $form = $("#staffSignForm");

    $buttons.click(function (e) {

        e.preventDefault();
        $("#offResponse").empty();
        $("#officererror").empty();

        var staff = $.trim($("#officers").val());



        if(staff.length == 0){

            $("#officererror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
        }


        if(staff.length != 0){

            $("#saveStaffSign").attr("disabled", "disabled");
            $("#off_wait").css("display","block");
            $("html, body").animate({ scrollTop: $("#offResponse").position().top }, "slow");

            $.ajax({
                type: "POST",
                url: "../../controllers/project/saveStaffSign.php",
                data: $form.serialize(),
                success: function(e) {

                    if(e=="fail"){

                        $('#offResponse').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Staff Sign off Failed To Save.</span></div><br>").hide().fadeIn(1000);
                        $("#off_wait").css("display","none");
                        $("#saveStaffSign").removeAttr('disabled');

                    }else if(e=="ok"){

                        $('#offResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Staff Sign off Saved Successfully.</span></div><br>").hide().fadeIn(1000);
                        $("#fp_wait").css("display","none");
                        $("#saveStaffSign").removeAttr('disabled');

                    }else{
                        $('#offResponse').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Staff Sign off Saved Successfully.</span></div><br>").hide().fadeIn(1000);

                        $("#off_wait").css("display","none");
                        $("#saveStaffSign").removeAttr('disabled');
                        $("#officers").val("");
                        $('#offlist').html(e);

                    }

                }
            });
            return false;
        }
    });

});
</script>

</body>

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:56:44 GMT -->
</html>

