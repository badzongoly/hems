<?php
    require_once('../../classes/mysql.class.php');
    $page = "dash";
    $sub_page_name = "cuser";

    $object = new MySQL();
    $object->checkLogin();

    $getSections = new MySQL();
    $getSections->Query("SELECT * FROM outcomes");

    $todaysMonthYear = trim(date('M-Y'));


    $countSubmitted = new MySQL();
    $countSubmitted->Query("SELECT IFNULL(COUNT(pmv_light.id),0) as submitted FROM pmv_light
                            LEFT JOIN pmv_sheet ON pmv_light.pmv_sheet_id = pmv_sheet.id
                            WHERE pmv_light.status = 'submitted' AND pmv_sheet.date = '$todaysMonthYear'");
    $subRow = $countSubmitted->Row();
    $allsubbed = $subRow->submitted;

    $countAppr = new MySQL();
    $countAppr->Query("SELECT IFNULL(COUNT(pmv_light.id),0) as approved FROM pmv_light
                       LEFT JOIN pmv_sheet ON pmv_light.pmv_sheet_id = pmv_sheet.id
                       WHERE  pmv_light.status = 'approved' AND pmv_sheet.date = '$todaysMonthYear'");
    $apprRow = $countAppr->Row();
    $allappr = $apprRow->approved;

    $countValid = new MySQL();
    $countValid->Query("SELECT IFNULL(COUNT(pmv_light.id),0) as validated FROM pmv_light
                        LEFT JOIN pmv_sheet ON pmv_light.pmv_sheet_id = pmv_sheet.id
                        WHERE status = 'validated' AND pmv_sheet.date = '$todaysMonthYear'");
    $valRow = $countValid->Row();
    $allval = $valRow->validated;
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/index_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:54:23 GMT -->
<head>
	<meta charset="utf-8" />
	<title>HEMS | Dashboard</title>
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
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    <link href="../../assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
    <link href="../../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="../../assets/plugins/morris/morris.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL CSS STYLE ================== -->
	
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

				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
                    <?php require_once('../inc/header.php');?>
				<!-- end header navigation right -->

		<!-- end #header -->
		
		<!-- begin #sidebar -->
            <?php require_once('../inc/menu.php');?>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Dashboard</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Hello <?php if(isset($_SESSION)){echo $_SESSION['hems_User']['first_name'];}?>, <small>welcome to H.E.M.S...</small></h1>
			<!-- end page-header -->
			<!-- begin row -->

			<!-- end row -->
			
			<!-- begin row -->

			<!-- end row -->
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-4 -->
			    <div class="col-md-4">
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="index-2">
			            <div class="panel-heading">
			                <h4 class="panel-title">Dashboard</h4>
			            </div>
			            <div class="panel-body bg-white">
                            <div data-scrollbar="true" data-height="225px">
                                <table class="table table-responsive">
                                    <tr>
                                        <td><select class="form-control" name="filter_op" id="filter_op">
                                                <option value="" selected disabled>--SELECT OPTION--</option>
                                                <option value="coffice">Country Office</option>
                                                <option value="section">Section</option>
                                                <option value="date">Date</option>
                                        </select></td>
                                    </tr>
                                </table>
                                <div id="sectionList" style="display: none">
                                    <table class="table table-responsive">
                                        <tr>
                                            <td><select class="form-control" name="section" id="section">
                                                    <option value="" selected disabled>--SELECT SECTION--</option>
                                                    <?php while(!$getSections->EndOfSeek()){ $secRow = $getSections->Row();?>
                                                    <option value="<?php echo $secRow->code;?>"><?php echo $secRow->name;?></option>
                                                    <?php } ?>
                                                </select></td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="dateList" style="display: none">
                                    <form id="dateSelForm" method="POST" action="">
                                    <table class="table table-responsive">
                                        <tr>
                                            <td>
                                                <select id="mon" name="mon" class="form-control form-inline" style="height: 35px;">

                                                    <?php for($m=1; $m<=12; $m++){ $month = date('M',mktime(0,0,0,$m,1,date('Y')))?>

                                                        <option value="<?php echo $month; ?>"><?php echo $month;?></option>
                                                    <?php }?>
                                                </select>
                                            </td>
                                            <td><select id="year" name="year" class="form-control form-inline" style="height: 35px;">
                                                    <?php for(($i=date('Y')); $i<=date('Y')+20; $i++){?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php }?>
                                                </select></td>
                                            <td><input type="submit" name="findDateReport" id="findDateReport" value="Show" class="btn btn-primary btn-sm"></td>
                                        </tr>
                                    </table>
                                        </form>
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <p align="center" style="display: none; color: limegreen;" id="load_wait"><img src="../../images/495.gif" > Loading... Please wait....</p>
                                </div>
                                <div id="statlist">

                                </div>
                            </div>

                        </div>
                        <div class="panel-footer">

                        </div>
			        </div>
			        <!-- end panel -->
			    </div>
			    <!-- end col-4 -->
			    <!-- begin col-4 -->
			    <div class="col-md-4">
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="index-3">
			            <div class="panel-heading">
			                <h4 class="panel-title">HACT</h4>
			            </div>
                        <div class="panel-body bg-white">
                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <td colspan="2" style="text-align: center"><h4>Country Office PMV Reports Status (<?php $splitMonthYear = explode('-',$todaysMonthYear); echo $splitMonthYear[0].', '.$splitMonthYear[1];?>)</h4></td>
                                </tr>
                                <tr>
                                    <td>Submitted: <?php echo $allsubbed;?></td>
                                </tr>
                                <tr>
                                    <td>Approved: <?php echo $allappr;?></td>
                                </tr>
                                <tr>
                                    <td>Validated : <?php echo $allval;?></td>
                                </tr>
                                <tr>
                                    <td><a href="../../views/projects/pmv_upload_list.php" class="btn btn-primary btn-sm btn-block">Fill PMV</a></td>
                                </tr>
                                <tr>
                                    <td><a href="../../views/projects/approve_pmv.php" class="btn btn-success btn-sm btn-block">Approve PMV</a></td>
                                </tr>
                                <tr>
                                    <td><a href="../../views/projects/validate_pmv.php" class="btn btn-default btn-sm btn-block">Validate PMV</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer text-center">

                        </div>
			        </div>
			        <!-- end panel -->
			    </div>
			    <!-- end col-4 -->
			    <!-- begin col-4 -->
			    <div class="col-md-4">
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="index-4">
			            <div class="panel-heading">
			                <h4 class="panel-title">E-File</h4>
			            </div>
                        <div class="panel-body bg-white">

                        </div>
			            <div class="panel-footer text-center">

			            </div>
			        </div>
			        <!-- end panel -->
			    </div>
			    <!-- end col-4 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
		
        <!-- begin theme-panel -->
<!--        <div class="theme-panel">-->
<!--            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>-->
<!--            <div class="theme-panel-content">-->
<!--                <h5 class="m-t-0">Color Theme</h5>-->
<!--                <ul class="theme-list clearfix">-->
<!--                    <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>-->
<!--                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>-->
<!--                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>-->
<!--                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>-->
<!--                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>-->
<!--                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>-->
<!--                </ul>-->
<!--                <div class="divider"></div>-->
<!--                <div class="row m-t-10">-->
<!--                    <div class="col-md-5 control-label double-line">Header Styling</div>-->
<!--                    <div class="col-md-7">-->
<!--                        <select name="header-styling" class="form-control input-sm">-->
<!--                            <option value="1">default</option>-->
<!--                            <option value="2">inverse</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row m-t-10">-->
<!--                    <div class="col-md-5 control-label">Header</div>-->
<!--                    <div class="col-md-7">-->
<!--                        <select name="header-fixed" class="form-control input-sm">-->
<!--                            <option value="1">fixed</option>-->
<!--                            <option value="2">default</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row m-t-10">-->
<!--                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>-->
<!--                    <div class="col-md-7">-->
<!--                        <select name="sidebar-styling" class="form-control input-sm">-->
<!--                            <option value="1">default</option>-->
<!--                            <option value="2">grid</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row m-t-10">-->
<!--                    <div class="col-md-5 control-label">Sidebar</div>-->
<!--                    <div class="col-md-7">-->
<!--                        <select name="sidebar-fixed" class="form-control input-sm">-->
<!--                            <option value="1">fixed</option>-->
<!--                            <option value="2">default</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row m-t-10">-->
<!--                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>-->
<!--                    <div class="col-md-7">-->
<!--                        <select name="content-gradient" class="form-control input-sm">-->
<!--                            <option value="1">disabled</option>-->
<!--                            <option value="2">enabled</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row m-t-10">-->
<!--                    <div class="col-md-5 control-label double-line">Content Styling</div>-->
<!--                    <div class="col-md-7">-->
<!--                        <select name="content-styling" class="form-control input-sm">-->
<!--                            <option value="1">default</option>-->
<!--                            <option value="2">black</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row m-t-10">-->
<!--                    <div class="col-md-12">-->
<!--                        <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <!-- end theme-panel -->
		
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
    <script src="../../assets/plugins/morris/raphael.min.js"></script>
    <script src="../../assets/plugins/morris/morris.js"></script>
    <script src="../../assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../../assets/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js"></script>
    <script src="../../assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
	<script src="../../assets/plugins/gritter/js/jquery.gritter.js"></script>

	<script src="../../assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
    <script type="text/javascript">
        $(document).on("change","#filter_op",function(){

            var filtop = $("#filter_op").prop("value");

            if(filtop=="section"){
                $("#sectionList").css("display","block");
            }else{
                $("#sectionList").css("display","none");
            }

            if(filtop=="date"){
                $("#dateList").css("display","block");
            }else{
                $("#dateList").css("display","none");
            }

            if(filtop=="coffice"){
                var filtDesc = "FetchCountryOffice";
                $("#load_wait").css("display","block");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/dashboard/cofficeReportStatFetch.php",
                    data: {filter : filtDesc},
                    success: function(e) {

                        $("#load_wait").css("display","none");

                        $('#statlist').html(e);

                    }
                });
            }

        });

        $(document).on("change","#section",function(){

            var sec = $("#section").prop("value");

            $("#load_wait").css("display","block");

            $.ajax({
                type: "POST",
                url: "../../controllers/dashboard/reportStatFetch.php",
                data: {section : sec},
                success: function(e) {

                        $("#load_wait").css("display","none");

                        $('#statlist').html(e);

                }
            });

        });


        $(function () {

            var $buttons = $("#findDateReport");
            var $form = $("#dateSelForm");
            $buttons.click(function (e) {

                e.preventDefault();
                $("#statlist").empty();

                var mon = $("#mon").prop("value");
                var year = $("#year").prop("value");

                    $("#findDateReport").attr("disabled", "disabled");
                    $("#load_wait").css("display","block");

                    $.ajax({
                        type: "POST",
                        url: "../../controllers/dashboard/reportDate.php",
                        data: $form.serialize(),
                        success: function(e) {


                                $('#statlist').html(e);
                                $("#load_wait").css("display","none");
                                $("#findDateReport").removeAttr('disabled');


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

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/index_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:54:41 GMT -->
</html>
