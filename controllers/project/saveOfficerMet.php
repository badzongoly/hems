<?php
session_start();
require_once('../../classes/mysql.class.php');


$update = new MySQL();

if(isset($_POST['off_name']) && isset($_POST['title'])){

    $valuesArray['name'] = MySQL::SQLValue($_POST['off_name']);
    $valuesArray['title'] = MySQL::SQLValue($_POST['title']);
    $valuesArray['contact_number'] = MySQL::SQLValue($_POST['cnum']);
    $valuesArray['email'] = MySQL::SQLValue($_POST['email']);
    $valuesArray['status'] = MySQL::SQLValue("active");
    $valuesArray['pmv_id'] = MySQL::SQLValue($_SESSION['hems_active_pmv']);
    $valuesArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
    $valuesArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

    $sql = MySQL::BuildSQLInsert("pmv_staff_met", $valuesArray);

    $result = $update->Query($sql);

    if($result){

        $pmvid = $_SESSION['hems_active_pmv'];
        $getStaffMet = new MySQL();
        $getStaffMet->Query("SELECT * FROM pmv_staff_met WHERE pmv_id = $pmvid");
        $conscount = $getStaffMet->RowCount();

    }else{

        echo  "fail";exit;
    }


}
?>

<table class="table table-bordered table-responsive table-striped">
    <thead>
    <tr>
        <td>Name</td>
        <td>Title</td>
        <td>Contact Number</td>
        <td>Email</td>
    </tr>
    </thead>
    <tbody>
    <?php  while(!$getStaffMet->EndOfSeek()){$listItemConst = $getStaffMet->Row();?>
        <tr>
            <td><?php echo $listItemConst->name;?></td>
            <td><?php echo $listItemConst->title;?></td>
            <td><?php echo $listItemConst->contact_number;?></td>
            <td><?php echo $listItemConst->email;?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>