<?php
    $page = "auth";
    $sub_page_name = "change_password";
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/index_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:54:23 GMT -->
<head>
	<meta charset="utf-8" />
	<title>HEMS | Change Password</title>
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
				<li><a href="javascript:;">Change Password</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Change Password</h1>
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
			        <div class="panel panel-primary" data-sortable-id="index-3">
			            <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
			                <h4 class="panel-title">Process Password Change</h4>
			            </div>
                        <div class="panel-body">
                            <div id="response"></div>
                            <div>
                                <p align="center" style="display:none; color: limegreen;" id="wait"><img src="../../images/495.gif" > Changing password. Please wait....</p>
                            </div>
                            <form method="post" id="changepassForm" action="">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="current">Current Password</label>
                                        <input type="text" class="form-control" name="current" id="current"
                                               placeholder="Current Password"/><div id="currerror"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="newpass">New Password</label>
                                        <input type="text" class="form-control" name="newpass" id="newpass"
                                               placeholder="New Password"/><div id="newerror"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confpass">Confirm New Password</label>
                                        <input type="text" class="form-control" name="confpass" id="confpass"
                                               placeholder="Confirm New Password"/><div id="cnewerror"></div>
                                    </div>

                                    <button type="submit" id="change_password" class="btn btn-sm btn-primary m-r-5">Change Password</button>
                                </fieldset>
                            </form>
                        </div>
			        </div>
			        <!-- end panel -->
			    </div>
			    <!-- end col-4 -->
			    <!-- begin col-4 -->
			    <div class="col-md-4">
			        <!-- begin panel -->
			        <div class="panel panel-primary" data-sortable-id="index-4">
			            <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
			                <h4 class="panel-title">Guidlines for Password Change <span class="pull-right label label-success"></span></h4>
			            </div>
                        <div class="panel-body" style="text-align: justify;">
                            <h5><strong>Your password must:</strong></h5><br>
                            <ul style="color: blue; list-style-type:square;">
                                <li>Be between six and thirty characters long</li>
                                <li>Have a minimum of one special character. Allowed Special characters ( @ , # , $ , % , & , ^ , * , ? , ! )</li>
                                <li>Have a minimum of one number</li>
                                <li>Have a minimum of four letters</li>
                            </ul>
                        </div>
			            <div class="panel-footer text-center">
			                <a href="javascript:;" class="text-inverse">View All</a>
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
<!--    <script src="../../assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>-->
<!--    <script src="../../assets/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js"></script>-->
    <script src="../../assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
	<script src="../../assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="../../assets/js/dashboard-v2.min.js"></script>
	<script src="../../assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
//			DashboardV2.init();
		});
	</script>
    <script type="text/javascript">

        $(function () {

            var $buttons = $("#change_password");
            var $form = $("#changepassForm");

            $buttons.click(function (e) {

                e.preventDefault();

                $("#response").empty();

                var current = $.trim($("#current").val());
                var newpass = $.trim($("#newpass").val());
                var confpass = $.trim($("#confpass").val());


                if(current.length == 0){

                    $("#currerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                    $("html, body").animate({ scrollTop: 0 }, "slow");

                }
                if(newpass.length == 0){

                    $("#newerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                    $("html, body").animate({ scrollTop: 0 }, "slow");

                }
                if(confpass.length == 0){

                    $("#cnewerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                    $("html, body").animate({ scrollTop: 0 }, "slow");

                }


                if(newpass==confpass) {

                    if (current.length != 0 && newpass.length != 0 && confpass.length != 0) {

                        $("#change_password").attr("disabled", "disabled");
                        $("#wait").css("display", "block");
                        $("html, body").animate({scrollTop: 0}, "slow");

                        $.ajax({
                            type: "POST",
                            url: "../../controllers/users/processPasswordChange.php",
                            data: $form.serialize(),
                            success: function (e) {

                                if (e == "db_check_error") {


                                    $('#response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Current password mismatch.</span></div><br>").hide().fadeIn(1000);
                                    $("#wait").css("display", "none");
                                    $("#change_password").removeAttr('disabled');


                                } else if (e == "fail") {

                                    $('#response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Password change failed.</span></div><br>").hide().fadeIn(1000);
                                    $("#wait").css("display", "none");
                                    $("#change_password").removeAttr('disabled');

                                } else if (e == "ok") {

                                    $('#response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Password was changed successfully.</span></div><br>").hide().fadeIn(1000);
                                    $("#wait").css("display", "none");
                                    $('#current').val("");
                                    $('#newpass').val("");
                                    $('#confpass').val("");
                                    $("#change_password").removeAttr('disabled');

                                } else {

                                    $('#response').html(e).hide().fadeIn(1000);
                                    $("#wait").css("display", "none");
                                    $("#change_password").removeAttr('disabled');

                                }


                            }
                        });
                        return false;
                    }

                }else{

                    $("#cnewerror").html('<p><small style="color:red;">new password confirmation doesnot match the new password itself.</small><p/>');
                    $("html, body").animate({ scrollTop: 0 }, "slow");

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

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/index_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:54:41 GMT -->
</html>
