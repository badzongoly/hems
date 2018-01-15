<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 11/01/2018
 * Time: 06:13 PM
 */
require_once('../../classes/mysql.class.php');
$page = "project";
$sub_page_name = "project";
$pull_ucat = new MySQL();
$pull_ucat->checkLogin();
$pull_ucat->Query("SELECT * FROM implementing_partners WHERE status= 'Active'");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.7/admin/html/form_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:56:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>HEMS | ADD PROJECT</title>
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
            <li class="active">Add Projects</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Project <small>add project...</small></h1>
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
                        <h4 class="panel-title">Add Project</h4>
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
                                        <td><label>Name:</label></td>
                                        <td><input type="text" name="name" id="name"  placeholder="Name" class="form-control"><p id="cname_error"></p></td>
                                        <td><label>Description:</label></td>
                                        <td><textarea class="form-control" placeholder="Description" id="description" name="description" rows="5"></textarea><p id="description_error"></p></td>
                                    </tr>
                                    <tr>
                                        <td><label>Implementing Partner:</label></td>
                                        <td>
                                            <select class="default-select2 form-control" id="partner_id" name="partner_id" style="height: 35px;">
                                                <?php while(!$pull_ucat->EndOfSeek()){ $ucrow = $pull_ucat->Row();?>
                                                <option value="<?php echo $ucrow->id;?>"><?php echo $ucrow->name;?></option>
                                               <?php }?>
                                            </select>
                                        </td>
                                        <td><label>Programme:</label></td>
                                        <td>
                                            <select class="default-select2 form-control" id="programme_id" name="programme_id" style="height: 35px;">
                                                <?php
                                                $pull_ucat->Query('Select * from programmes WHERE  status = "Active"');
                                                while(!$pull_ucat->EndOfSeek()){ $ucrow = $pull_ucat->Row();?>
                                                    <option value="<?php echo $ucrow->id;?>"><?php echo $ucrow->name;?></option>
                                                <?php }?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Number of PMV:</label></td>
                                        <td><input type="number" name="pmv" id="pmv"  class="form-control" style="width: 100px;"><p id="pmv_error"></p></td>
                                        <td><label>Number of Spot checks:</label></td>
                                        <td><input type="number" name="spot_check" id="spotcheck" class="form-control" style="width: 100px;"><p id="spotcheck_error"></p></td>
                                    </tr>
                                    <tr>
                                        <td><label>Number of Audit:</label></td>
                                        <td><input type="number" name="audit" id="audit" class="form-control" style="width: 100px;"><p id="audit_error"></p></td>
                                        <td><label>Start Date:</label></td>
                                        <td>
                                            <input type="text" name="start_date" class="form-control" id="datepicker-default" placeholder="Select Date" /> <span id="startdate_error"></span>

                                        </td>

                                    </tr><tr>
                                        <td><label>Duration (Number of Months):</label></td>
                                        <td><input type="number" name="duration" id="duration" class="form-control" style="width: 100px;"><p id="duration_error"></p></td>
                                        <td><label>Status:</label></td>
                                        <td>
                                            <select class="default-select2 form-control" id="status" name="status" style="height: 35px;">
                                                <option value="Active">Active</option>
                                                <option value="Active">Inactive</option>
                                            </select>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td colspan="4"><input  type="submit" name="save" id="save" class="btn btn-primary" value="Save"></td>
                                    </tr>

                                    </tbody>

                                    <input type="hidden" name="do" value="CreateProject">

                                </table>
                                <hr>
                            </form>
                            <div>
                                <p align="center" style="display: none; color: limegreen;" id="wait"><img src="../../images/495.gif" > Adding project. Please wait....</p>
                            </div>
                            <div id="uc_response"></div>
                        </div>

                        <div id="uclisted">
                            <?php $pull_ucat->Query("SELECT p.id, p.name AS project, i.name AS partner, pr.name AS programme,p.spot_check,p.pmv,p.audit,p.start_date,p.duration,p.status FROM project p INNER JOIN implementing_partners i ON i.id = p.partner_id INNER JOIN programmes pr ON  pr.id = p.programme_id");?>
                            <table class="table table-striped table-hover table-email table-bordered" style="width: 80%;" align="center">
                                <thead>
                                <tr>
                                    <th> Name</th>
                                    <th>Partner</th>
                                    <th>Programme</th>
                                    <th>Number of PMV(S)</th>
                                    <th>Number of Spot check(S)</th>
                                    <th>Number of Audit(S)</th>
                                    <th>Start Date</th>
                                    <th>duration</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while(!$pull_ucat->EndOfSeek()){ $ucrow = $pull_ucat->Row();?>
                                    <tr>
                                        <td><?php echo $ucrow->project;?></td>
                                        <td><?php echo $ucrow->partner;?></td>
                                        <td><?php echo $ucrow->programme;?></td>
                                        <td><?php echo $ucrow->pmv;?></td>
                                        <td><?php echo $ucrow->spot_check;?></td>
                                        <td><?php echo $ucrow->audit;?></td>
                                        <td><?php echo $ucrow->start_date;?></td>
                                        <td><?php echo $ucrow->duration." Months";?></td>
                                        <td><?php echo $ucrow->status;?></td>
                                        <td><a href="#" id="delete" data-id="<?php echo $ucrow->id;?>" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a> </td>
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
<script src="../../assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        FormPlugins.init();
    });
</script>
<script>
    $(function () {

        var $buttons = $("#save");
        var $form = $("#createUserCatForm");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#uc_response").empty();
            $("#cname_error").empty();
            $("#description_error").empty();
            $('#pmv_error').empty();
            $("#spotcheck_error").empty();
            $("#audit_error").empty();
            $("#startdate_error").empty();
            $("#duration_error").empty();
            var cname = $.trim($("#name").val());
            var location = $.trim($("#description").val());
            var pmv = $.trim($("#pmv").val());
            var spotcheck = $.trim($("#spotcheck").val());
            var audit = $.trim($("#audit").val());
            var startdate = $.trim($("#datepicker-default").val());
            var duration = $.trim($("#duration").val());

            if(cname.length == 0){

                $("#cname_error").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");

            }
            if(location.length == 0){
                $("#duration_error").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
             if(pmv.length == 0){

                            $("#pmv_error").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                            $("html, body").animate({ scrollTop: 0 }, "slow");

                        }
                        if(audit.length == 0){
                            $("#audit_error").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                            $("html, body").animate({ scrollTop: 0 }, "slow");
                        }
if(spotcheck.length == 0){
                            $("#spotcheck_error").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                            $("html, body").animate({ scrollTop: 0 }, "slow");
                        }     if(startdate.length == 0){
                            $("#startdate_error").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                            $("html, body").animate({ scrollTop: 0 }, "slow");
                        }
if(duration.length == 0){
                            $("#duration_error").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
                            $("html, body").animate({ scrollTop: 0 }, "slow");
                        }


            if(cname.length != 0 && location.length != 0&& pmv.length != 0 &&  audit.length != 0 &&  startdate.length != 0 &&  duration.length != 0 &&  spotcheck.length != 0){

                $("#save").attr("disabled", "disabled");
                $("#wait").css("display","block");
                $("html, body").animate({ scrollTop: 0 }, "slow");

                $.ajax({
                    type: "POST",
                    url: "../../controllers/project/projectsController.php",
                    data: $form.serialize(),
                    success: function(e) {


                        if(e=="error"){


                            $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to save project.</span></div><br>").hide().fadeIn(1000);
                            $("#wait").css("display","none");
                            $("#save").removeAttr('disabled');
                            $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to save project.</span></div><br>").fadeOut(6000);

                        }else if(e=="exists"){


                            $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>This project already exists.</span></div><br>").hide().fadeIn(1000);
                            $("#wait").css("display","none");
                            $("#save").removeAttr('disabled');
                            $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>This project already exists.</span></div><br>").fadeOut(6000);

                        }else {

                            $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Project saved successfully.</span></div><br>").hide().fadeIn(1000);
                            $('#uclisted').empty();
                            $('#uclisted').html(e);
                            $("#wait").css("display","none");
                            $("#name").val("");
                            $("#location").val("");
                            $("#contact_person").val("");
                            $("#phone").val("");
                            $("#email").val("");
                            $("#save").removeAttr('disabled');
                            $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Project saved successfully.</span></div><br>").fadeOut(6000);
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
                data:{id:id,do_action:action},
                url:"../../controllers/project/projectsController.php",
                success:function (data) {
                    if(e=="error"){
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Failed to project.</span></div><br>").hide().fadeIn(1000);
                        $("#wait").css("display","none");
                        $("#save").removeAttr('disabled');


                    }else {

                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Project deleted successfully.</span></div><br>").hide().fadeIn(1000);

                        $('#uclisted').html(data);
                        $("#wait").css("display","none");
                        $('#uc_response').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Project deleted successfully.</span></div><br>").fadeOut(6000);

                    }

                }
                
            })
        })

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

