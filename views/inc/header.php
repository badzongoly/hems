<?php
<<<<<<< HEAD
if(!isset($_SESSION)){
    session_start();
}
=======
    if(!isset($_SESSION)){session_start();}

>>>>>>> 4b7077e0fd0ffbcfc312ac8b3773b5c40dc5ff40
    require_once('../../classes/mysql.class.php');

    $security = new MySQL();
    $security->checkLogin();

    $user_fullname = $_SESSION['hems_User']['first_name'].' '.$_SESSION['hems_User']['last_name'];
?>
<div id="header" class="header navbar navbar-default navbar-fixed-top" style="border-bottom: 3px solid slategray;">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
<!--            <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> Color Admin</a>-->
<!--            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
            <img src="../../images/hems-logo-inner.png">
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <form class="navbar-form full-width">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter keyword"/>
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </li>
            <li class="dropdown">
                <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                    <i class="fa fa-bell-o"></i>
                    <span class="label">5</span>
                </a>
                <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                    <li class="dropdown-header">Notifications (5)</li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                            <div class="media-body">
                                <h6 class="media-heading">Server Error Reports</h6>

                                <div class="text-muted f-s-11">3 minutes ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><img src="assets/img/user-1.jpg" class="media-object" alt=""/></div>
                            <div class="media-body">
                                <h6 class="media-heading">John Smith</h6>

                                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>

                                <div class="text-muted f-s-11">25 minutes ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><img src="assets/img/user-2.jpg" class="media-object" alt=""/></div>
                            <div class="media-body">
                                <h6 class="media-heading">Olivia</h6>

                                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>

                                <div class="text-muted f-s-11">35 minutes ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                            <div class="media-body">
                                <h6 class="media-heading"> New User Registered</h6>

                                <div class="text-muted f-s-11">1 hour ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                            <div class="media-body">
                                <h6 class="media-heading"> New Email From John</h6>

                                <div class="text-muted f-s-11">2 hour ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-footer text-center">
                        <a href="javascript:;">View more</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="../../assets/img/user-13.jpg" alt=""/>
                    <span class="hidden-xs"><?php if(isset($user_fullname)){echo $user_fullname;}?></span> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInLeft">
                    <li class="arrow"></li>
                    <li><a href="../users/user_profile.php">User Profile</a></li>
                    <li><a href="../auth/change_password.php">Change Password</a></li>
                    <li><a href="../../controllers/auth/logout.php">Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- end container-fluid -->
</div>