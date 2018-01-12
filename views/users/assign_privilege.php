<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/01/2018
 * Time: 06:13 PM
 */
require_once('../../classes/mysql.class.php');
if(!isset($_SESSION)){
    session_start();
}
$object = new MySQL();
$object->checkLogin();
$page = "user";
$sub_page_name  = "assign_privilege";
$alluserlinks = new MySQL();

$psql = sprintf("SELECT * FROM usr_links WHERE status = 'Active' ORDER BY disp_order");

$all_links = $alluserlinks->QueryArray($psql, MYSQLI_ASSOC);

$main = array();
$children = array();
if(!empty($all_links)) {
    foreach ($all_links as $r_links) {
        if ($r_links['link_parent'] == 0) {
            $main[] = $r_links;
        } else {
            $children[] = $r_links;
        }
    }
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
    <title>HEMS | ASSIGN PRIVILEGE</title>
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
            <li class="active">Assign Privilege</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">User Management <small>assign privilege...</small></h1>
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
                        <h4 class="panel-title">Assign Privilege</h4>
                    </div>
                    <div class="panel-body">
                            <div class="box-body">

                                <div align="center"><img src="../../images/495.gif" alt="loading" id="wait" style="display: none; margin-top: -8px;"></div>
                                <p id="ack" class="login-box-msg"></p>
                                <br>

                                <div class="row" align="center">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div>
                                                <p align="center" style="display: none; color: limegreen;" id="wait"><img src="../../images/495.gif" alt="loading" id="" style="display: none; margin-top: -8px;"> saving privileges. Please wait....</p>
                                                <p align="center" style="display: none; color: limegreen;" id="wait_fetch"><img src="../../images/495.gif" alt="loading" id="" style="display: none; margin-top: -8px;"> Fetching privileges for selected category. Please wait....</p>
                                            </div>
                                            <div>

                                                <form method="POST" class="new_user_form" action="" id="laform">
                                                    <table class="table table-responsive table-email table-bordered" align="center">
                                                        <tr>
                                                            <td colspan="4"><p id="confirmation" style="text-align:center"></p></td>
                                                        </tr>


                                                        <tr>
                                                            <td><label>Category:</label></td>
                                                            <td><select name="user_cat" id="user_cat" style=" height:30px" class="form-control" data-placeholder="SELECT CATEGORY...">
                                                                    <option disabled selected></option>
                                                                    <?php $cat = new MySQL; $cat->Query("SELECT * FROM usr_cat ORDER BY cat_name ASC");
                                                                    while(!$cat->EndOfSeek()){$crow = $cat->Row(); ?>
                                                                        <option value="<?php echo $crow->cat_id; ?>">
                                                                            <?php echo $crow->cat_name; ?>
                                                                        </option>
                                                                    <?php }?>
                                                                </select>
                                                            </td>
                                                            <td><div><input type="submit" id="assign" class="btn btn-primary rounded-4" value="Assign Privileges"></div></td>
                                                        </tr>
                                                    </table>
                                                    <div id="listarea">
                                                        <table class="table table-responsive table-bordered">
                                                            <?php foreach($main as $mainlink){ ?>
                                                                <tr>
                                                                    <td colspan="2"><h5><strong><?php echo $mainlink['link_name']; ?></strong></h5></td>
                                                                </tr>
                                                                <?php foreach($children as $subs){ if($mainlink['link_id']==$subs['link_parent']){ ?>
                                                                    <tr>
                                                                        <td style="width: 60px;"><input type="checkbox" name="priv_check[]" id="priv_check" value="<?php echo $subs['link_id'];?>"></td>
                                                                        <td><?php echo $subs['link_name'];?></td>
                                                                    </tr>
                                                                <?php }} ?>
                                                            <?php } ?>
                                                        </table>
                                                    </div>
                                                    <input type="hidden" name="do" value="assignPrivs">
                                                </form>
                                            </div>
                                        </div>>
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
    $(document).on("change","#user_cat",function(){
        var dropvalue = $("#user_cat").val();

        $("#wait_fetch").css("display", "block");

        $.ajax({
            type: "POST",
            url: "../../controllers/users/userController.php",
            data: {category_id : dropvalue
            },
            success:function(data) {


                $('#listarea').html(data);
                $("#assign").removeAttr('disabled');
                $("#wait_fetch").css("display","none");


            }

        });
    });



    $("document").ready(function(){

        $("#assign").attr("disabled", true)

    });

    $(function () {

        var $btns = $("#assign");
        $btns.click(function (e) {
            e.preventDefault();

            $("#wait").css("display","block");
            $("#assign").attr("disabled", "disabled");
console.log($('#laform').serialize());
            $.ajax({
                type: "POST",
                url: "../../controllers/users/userController.php",
                data: $('#laform').serialize(),
                success: function(e) {


                    if(e=="d_fail"){
                        $("#wait").css("display","none");
                        $("#assign").removeAttr('disabled');


                        $('#confirmation').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> User privilege assignment failed</span></div>");
                        $("#confirmation").hide().fadeIn(2000).fadeOut(4000);

                    }else if(e=="ok"){

                        $("#wait").css("display","none");
                        $("#assign").removeAttr('disabled');


                        $('#confirmation').html("<div align='center'><span class='alert alert-success'><i class='icon icon-ok-sign'></i> User privileges were assigned successfully</span></div>");
                        $("#confirmation").hide().fadeIn(2000).fadeOut(4000);

                    }else if(e=="unchecked"){

                        $("#wait").css("display","none");
                        $("#assign").removeAttr('disabled');


                        $('#confirmation').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> Privilege assignment failed. No option was checked before assigning privileges</span></div>");
                        $("#confirmation").hide().fadeIn(2000);

                    }else if(e=="unselected"){

                        $("#wait").css("display","none");
                        $("#assign").removeAttr('disabled');


                        $('#confirmation').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i>Privilege assignment failed. No user category was selected</span></div>");
                        $("#confirmation").hide().fadeIn(2000);

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

