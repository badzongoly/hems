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
$sub_page_name = "edit_user";
$user_id = -1;
if(isset($_GET)){
    $user_id = base64_decode($_GET['id']);
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
    <title>HEMS | EDIT USER</title>
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
            <li class="active">Edit User</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">User Management <small>edit users...</small></h1>
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
                        <h4 class="panel-title">Edit User</h4>
                    </div>
                    <div class="panel-body">
                        <?php $object->Query("Select * from usr_users WHERE user_id = $user_id");
                        $newRow  =  $object->Row();
                        ?>
                        <form class="form-horizontal" id="form">
                            <div align="center"><img src="../../images/495.gif" alt="loading" id="wait" style="display: none; margin-top: -8px;"></div>
                            <p id="ack" class="login-box-msg"></p>
                            <br>
                            <div class="form-group col-lg-6 col-xs-12">
                                <label class="col-md-3 control-label">First Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="<?php echo $newRow->first_name;?>" />
                                    <span id="fnameerror"></span>
                                </div>
                            </div>
                            <div class="form-group col-lg-6 col-xs-12">
                                <label class="col-md-3 control-label">Last Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="<?php echo $newRow->last_name;?>"/>
                                    <span id="lnameerror"></span>
                                </div>
                            </div>
                            <div class="form-group col-lg-6 col-xs-12">
                                <label class="col-md-3 control-label">Email Addres</label>
                                <div class="col-md-9">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="name@domain.com" value="<?php echo $newRow->email;?>" />
                                    <span id="emailerror"></span>
                                </div>
                            </div>
                            <div class="form-group col-lg-6 col-xs-12">
                                <label class="col-md-3 control-label">Phone Number</label>
                                <div class="col-md-9">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="<?php echo $newRow->phone;?>" />
                                    <span id="phoneerror"></span>
                                </div>
                            </div>

                            <div class="form-group col-lg-6 col-xs-12">
                                <label class="col-md-3 control-label">User Category</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="user_cat" id="user_cat">
                                        <option disabled selected>Select User Category</option>
                                      <?php $object = new MySQL();
                                      $object->Query("Select * from usr_cat WHERE status = 'Active'");
                                      while (!$object->EndOfSeek()){
                                          $row= $object->Row();
                                          ?>
                                        <option value="<?php echo $row->cat_id;?>" <?php if($newRow->user_cat == $row->cat_id){echo "selected";} ?>> <?php echo $row->cat_name;?></option>
                                        <?php
                                            }
                                      ?>
                                    </select>
                                    <span id="caterror"></span>
                                </div>
                            </div> <div class="form-group col-lg-6 col-xs-12">
                                <label class="col-md-3 control-label">User Status</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="status" id="status">
                                        <option value="Active" <?php if($newRow->status == 'Active'){echo "selected";}?> >Active</option>
                                        <option value="Inactive" <?php if($newRow->status == 'Inactive'){echo "selected";}?> >Inactive</option>

                                    </select>
                                    <span id="statuserror"></span>
                                </div>
                            </div>
                            <br/><br/><br/>
                            <div class="form-group">
                                <div class="col-md-12" align="center">
                                    <button type="submit" id="add" class="btn btn-sm btn-success">Edit User</button>
                                </div>
                            </div>
                            <input type="hidden" name="do" value="editUser"/>
                            <input type="hidden" name="id"  value="<?php echo $user_id;?>"/>
                        </form>
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
    $(document).on('click','#add',function(e){
        e.preventDefault();
        $("#fnameerror").empty();
        $("#lnameerror").empty();
        $("#emailerror").empty();
        $("#phoneerror").empty();
        $("#statuserror").empty();
        $("#caterror").empty();

        var fname = $.trim($("#first_name").val());
        var lname = $.trim($("#last_name").val());
        var email = $.trim($("#email").val());
        var phone = $.trim($("#phone").val());
        var category = $.trim($("#user_cat").val());
        var status = $.trim($("#status").val());
        if(fname.length == 0){

            $("#fnameerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");

        }if(lname.length == 0){

            $("#lnameerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");

        }if(validateEmail(email) == false){

            $("#emailerror").html('<p><small style="color:red;">please enter a valid email.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");

        }

        if(phone.length == 0){

            $("#phoneerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");

        }if(category.length == 0){

            $("#caterror").html('<p><small style="color:red;">please select an option.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");

        }

        if(status.length == 0){

            $("#statuserror").html('<p><small style="color:red;">please select an option.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");

        }

        if(fname.length != 0 && lname.length != 0&& email.length != 0&& status.length != 0&& category.length != 0&& phone.length != 0) {

            $("#wait").css("display", "block");
            $("#add").attr("disabled", "disabled");
            $.ajax({
                type: "POST",
                url: "../../controllers/users/userController.php",
                data: $("#form").serialize(),
                success: function (e) {
                    console.log(e);

                    if (e == "fail") {
                        $("#wait").css("display", "none");
                        $("#add").removeAttr('disabled');

                        $('#username').val("");
                        $('#password').val("");

                        $('#ack').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> User Creation Failed</span></div>")
                        $("#ack").hide().fadeIn(2000).fadeOut(4000);

                    } else if (e == "ok") {

                        $("#wait").css("display", "none");
                        $("#add").removeAttr('disabled');

                        $('#username').val("");
                        $('#password').val("");
                        $('#ack').html("<div align='center'><span class='alert alert-success'><i class='icon icon-ok-sign'></i> User Updated successfully</span></div>")
                        $("#ack").hide().fadeIn(2000).fadeOut(4000);

                    } else if (e == "incomplete") {

                        $("#wait").css("display", "none");
                        $("#add").removeAttr('disabled');

                        $('#username').val("");
                        $('#password').val("");
                        $('#ack').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> Complete all fields before submitting</span></div>");
                        $("#confirmation").hide().fadeIn(2000);

                    } else if (e == "exists") {

                        $("#wait").css("display", "none");
                        $("#add").removeAttr('disabled');

                        $('#username').val("");
                        $('#password').val("");
                        $('#ack').html("<div align='center'><span class='alert alert-danger'><i class='icon icon-remove-sign'></i> User already exists in the system</span></div>")
                        $("#confirmation").hide().fadeIn(2000);

                    }


                }
            });
            return false;
        }

    });
    function validateEmail(sEmail) {
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if (filter.test(sEmail)) {
            return true;
        }
        else {
            return false;
        }
    }
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

