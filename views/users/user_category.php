<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/01/2018
 * Time: 06:13 PM
 */
require_once('../../classes/mysql.class.php');
$page = "user";
$sub_page_name = "usr_category";
$pull_ucat = new MySQL();
$pull_ucat->checkLogin();
$pull_ucat->Query("SELECT * FROM usr_cat");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:56:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>HEMS | ADD USER</title>
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
            <li><a href="javascript:;">User Managerment</a></li>
            <li class="active">User Category</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">User Management <small>user category...</small></h1>
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
                        <h4 class="panel-title">User Category</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form id="createUserCatForm" method="post" action="">

                                <table class="table table-responsive table-striped table-bordered" align="center">

                                    <thead>

                                    <tr>
                                        <td colspan="5"><p id="confirmation" style="text-align:center"></p></td>
                                    </tr>

                                    </thead>
                                    <tbody>


                                    <tr>
                                        <td><label>Category Name:</label></td>
                                        <td><input type="text" name="cat_name" id="cat_name" class="form-control"><p id="cname_error"></p></td>
                                        <td><label>Status:</label></td>
                                        <td>
                                            <select class="form-control" id="status" name="status" style="height: 35px;">
                                                <option value="Active">Active</option>
                                                <option value="Active">Inactive</option>
                                            </select>
                                        </td>

                                        <td><input  type="submit" name="save" id="save" class="btn btn-primary" value="Save"></td>
                                    </tr>

                                    </tbody>

                                    <input type="hidden" name="do" value="CreateUserCat">

                                </table>
                                <hr>
                            </form>
                            <div>
                                <p align="center" style="display: none; color: limegreen;" id="wait"><img src="../../images/495.gif" > Adding user category. Please wait....</p>
                            </div>
                            <div id="uc_response"></div>
                        </div>

                        <div id="uclisted">
                            <table class="table table-striped table-hover table-email table-bordered" style="width: 400px;" align="center">
                                <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while(!$pull_ucat->EndOfSeek()){ $ucrow = $pull_ucat->Row();?>
                                    <tr>
                                        <td><?php echo $ucrow->cat_name;?></td>
                                        <td><?php echo $ucrow->status;?></td>
                                        <td><a href="#" id="delete" data-id="<?php echo $ucrow->cat_id;?>" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a> </td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
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

    <!-- begin theme-panel -->
    <div class="theme-panel">
        <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
        <div class="theme-panel-content">
            <h5 class="m-t-0">Color Theme</h5>
            <ul class="theme-list clearfix">
                <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
            </ul>
            <div class="divider"></div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">Header Styling</div>
                <div class="col-md-7">
                    <select name="header-styling" class="form-control input-sm">
                        <option value="1">default</option>
                        <option value="2">inverse</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label">Header</div>
                <div class="col-md-7">
                    <select name="header-fixed" class="form-control input-sm">
                        <option value="1">fixed</option>
                        <option value="2">default</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                <div class="col-md-7">
                    <select name="sidebar-styling" class="form-control input-sm">
                        <option value="1">default</option>
                        <option value="2">grid</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label">Sidebar</div>
                <div class="col-md-7">
                    <select name="sidebar-fixed" class="form-control input-sm">
                        <option value="1">fixed</option>
                        <option value="2">default</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                <div class="col-md-7">
                    <select name="content-gradient" class="form-control input-sm">
                        <option value="1">disabled</option>
                        <option value="2">enabled</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">Content Styling</div>
                <div class="col-md-7">
                    <select name="content-styling" class="form-control input-sm">
                        <option value="1">default</option>
                        <option value="2">black</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-12">
                    <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
                </div>
            </div>
        </div>
    </div>
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
<script src="../../assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script>
    $(function () {

        var $buttons = $("#save");
        var $form = $("#createUserCatForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#uc_response").empty();

            var cname = $.trim($("#cat_name").val());


            if(cname.length == 0){

                $("#cname_error").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");

            }


            if(cname.length != 0){

                $("#save").attr("disabled", "disabled");
                $("#wait").css("display","block");
                $("html, body").animate({ scrollTop: 0 }, "slow");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/users/userController.php",
                    data: $form.serialize(),
                    success: function(e) {


                        if(e=="error"){


                            $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to save user category.</span></div><br>").hide().fadeIn(1000);
                            $("#wait").css("display","none");
                            $("#save").removeAttr('disabled');
                            $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to save user category.</span></div><br>").fadeOut(6000);

                        }else if(e=="exists"){


                            $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>This user category already exists.</span></div><br>").hide().fadeIn(1000);
                            $("#wait").css("display","none");
                            $("#save").removeAttr('disabled');
                            $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>This user category already exists.</span></div><br>").fadeOut(6000);

                        }else {

                            $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>User category saved successfully.</span></div><br>").hide().fadeIn(1000);
                            $('#uclisted').empty();
                            $('#uclisted').html(e);
                            $("#wait").css("display","none");
                            $("#cat_name").val("");
                            $("#save").removeAttr('disabled');
                            $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>User category saved successfully.</span></div><br>").fadeOut(6000);
                        }


                    }
                });
                return false;
            }
        });
        
        $(document).on('click','#delete',function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var action = "delete";
            $.ajax({
                type:"POST",
                data:{id:id,act:action},
                url:"../../controllers/users/userController.php",
                success:function (data) {
                    if(e=="error"){
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to save user category.</span></div><br>").hide().fadeIn(1000);
                        $("#wait").css("display","none");
                        $("#save").removeAttr('disabled');


                    }else {

                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>User category deleted successfully.</span></div><br>").hide().fadeIn(1000);

                        $('#uclisted').html(data);
                        $("#wait").css("display","none");
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>User category deleted successfully.</span></div><br>").fadeOut(6000);

                    }

                }
                
            })
        })

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

