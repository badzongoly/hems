<?php
session_start();
require_once('../../classes/mysql.class.php');


$update = new MySQL();

if(isset($_POST['smet'])){

    $sid = $_POST['smet'];
    $sql = "DELETE FROM pmv_staff_met WHERE id = $sid";

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
        <td>&nbsp;</td>
    </tr>
    </thead>
    <tbody>
    <?php  while(!$getStaffMet->EndOfSeek()){$listItemConst = $getStaffMet->Row();?>
        <tr>
            <td><?php echo $listItemConst->name;?></td>
            <td><?php echo $listItemConst->title;?></td>
            <td><?php echo $listItemConst->contact_number;?></td>
            <td><?php echo $listItemConst->email;?></td>
            <td><a id="del_pstaff" href="#" name="<?php echo $listItemConst->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>