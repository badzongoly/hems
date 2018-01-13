<?php
require_once("../../classes/mysql.class.php");

if (isset($_SESSION['hems_User']['user_cat'])) {
    $colname_links = $_SESSION['hems_User']['user_cat'];
}

$menu = new MySQL();

$sql = sprintf("SELECT usr_links.link_id, usr_links.page_id,usr_links.page_id_sub, usr_links.link_url, usr_links.link_name, usr_links.link_image, usr_links.link_parent FROM usr_cat_links INNER JOIN usr_links ON usr_cat_links.link_id = usr_links.link_id WHERE usr_cat_links.cat_id = %s ORDER BY usr_links.link_name ASC", MySQL::SQLValue($colname_links, MySQL::SQLVALUE_NUMBER));

$links = $menu->QueryArray($sql, MYSQLI_ASSOC);

$parents = array();
$child = array();

foreach($links as $row_links){
    if($row_links['link_parent']==0){
        $parents[] = $row_links;
    }else{
        $child[] = $row_links;
    }
}
?>
<div id="sidebar" class="sidebar">
<!-- begin sidebar scrollbar -->
<div data-scrollbar="true" data-height="100%">
<!-- begin sidebar user -->
<ul class="nav">
    <li class="nav-profile">
        <div class="image">
            <a href="javascript:;"><img src="../../assets/img/user-13.jpg" alt="" /></a>
        </div>
        <div class="info">
            <?php if(isset($_SESSION['hems_User'])){ echo $_SESSION['hems_User']['first_name'].' '.$_SESSION['hems_User']['last_name'];}?>
            <small><?php if(isset($_SESSION['hems_User'])){ echo $_SESSION['hems_User']['cat_name'];}?></small>
        </div>
    </li>
</ul>
<!-- end sidebar user -->
<!-- begin sidebar nav -->
<ul class="nav">
    <li class="nav-header"></li>
    <li class="<?php if($page == "dash"){echo "active";}?>">
        <a href="../../views/dashboard/dashboard.php">
            <strong><i class="fa fa-home"></i>
                <span>Home</span></strong>
        </a>
    </li>

    <?php foreach($parents as $parent){ ?>
        <li class="has-sub <?php if($page==$parent['page_id']){echo "active";}?>">
            <a href="javascript:;">
                <b class="caret pull-right"></b>
                <i class="<?php echo $parent['link_image'] ?>"></i>
                <span class="title"><strong><?php echo $parent['link_name']; ?></strong></span>
                <span class="<?php if($page==$parent['page_id']){echo "selected";}?>"></span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <?php foreach($child as $sub){ if($parent['link_id']==$sub['link_parent']){ ?>
                    <li class="<?php if($sub_page_name == $sub['page_id_sub']){echo "active";}?>">
                        <a href="<?php echo $sub['link_url'] ?>"><?php echo $sub['link_name']; ?></a>
                    </li>
                <?php } } ?>
            </ul>
        </li>
    <?php } ?>
<!-- begin sidebar minify button -->
<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
<!-- end sidebar minify button -->
</ul>
<!-- end sidebar nav -->
</div>
<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>