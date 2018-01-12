<?php
    session_start();
    require_once('../../classes/mysql.class.php');
    $page = "user";
    $sub_page_name = "user_profile";

    $userId = $_SESSION['hems_User']['user_id'];
    $getUserDetails = new MySQL();
    $getUserDetails->Query("SELECT first_name,last_name,username,email,phone FROM usr_users WHERE user_id = $userId");

    $userRow = $getUserDetails->Row();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/index_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:54:23 GMT -->
<head>
	<meta charset="utf-8" />
	<title>HEMS | User Profile</title>
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
				<li><a href="javascript:;">User Profile</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">My Profile</h1>
			<!-- end page-header -->
			<!-- begin row -->

			<!-- end row -->
			
			<!-- begin row -->

			<!-- end row -->
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-4 -->

			    <!-- end col-4 -->
			    <!-- begin col-4 -->
			    <div class="col-md-8">
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="index-3">
			            <div class="panel-heading">
			                <h4 class="panel-title">User Profile Details</h4>
			            </div>
                        <div class="panel-body">
                            <div class="form-group col-md-12">
                                <label class="col-md-3 control-label"><strong>User Fullname:</strong></label>

                                <div class="col-md-9">
                                    <?php echo $userRow->first_name . ' ' . $userRow->last_name; ?>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="col-md-3 control-label"><strong>Username:</strong></label>

                                <div class="col-md-9">
                                    <?php echo $userRow->username; ?>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-md-3 control-label"><strong>Email:</strong></label>

                                <div class="col-md-9">
                                    <?php echo $userRow->email; ?>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="col-md-3 control-label"><strong>Phone Number:</strong></label>

                                <div class="col-md-9">
                                    <?php echo $userRow->phone; ?>
                                </div>
                            </div>
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
			                <h4 class="panel-title">Profile Image <span class="pull-right label label-success"></span></h4>
			            </div>
                        <div class="panel-body" style="text-align: center;">
                            <img style="width: 200px" height="200px" src="../../images/image-placeholder.png" alt="Profile Image">
                        </div>
			            <div class="panel-footer text-center">
<!--			                <a href="javascript:;" class="text-inverse">View All</a>-->
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
	<script src="../../assets/js/dashboard-v2.min.js"></script>
	<script src="../../assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			DashboardV2.init();
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
