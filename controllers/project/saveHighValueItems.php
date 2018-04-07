<?php
session_start();
require_once('../../classes/mysql.class.php');


$update = new MySQL();

if(isset($_POST['item_desc']) && isset($_POST['quantity'])){

    $valuesArray['item_desc'] = MySQL::SQLValue($_POST['item_desc']);
    $valuesArray['quantity'] = MySQL::SQLValue($_POST['quantity']);
    $valuesArray['location'] = MySQL::SQLValue($_POST['location']);
    $valuesArray['condition'] = MySQL::SQLValue($_POST['condition']);
    $valuesArray['remarks'] = MySQL::SQLValue($_POST['remarks']);
    $valuesArray['status'] = MySQL::SQLValue("active");
    $valuesArray['pmv_id'] = MySQL::SQLValue($_SESSION['hems_active_pmv']);
    $valuesArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
    $valuesArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

    $sql = MySQL::BuildSQLInsert("pmv_hv_items", $valuesArray);

    $result = $update->Query($sql);

    if($result){

        $pmvid = $_SESSION['hems_active_pmv'];
        $getHv = new MySQL();
        $getHv->Query("SELECT * FROM pmv_hv_items WHERE pmv_id = $pmvid");

    }else{

        echo  "fail";exit;
    }


}
?>

<table class="table table-bordered table-responsive table-striped">
    <thead>
    <tr>
        <td>Item Description</td>
        <td>Quantity</td>
        <td>Location</td>
        <td>Condition</td>
        <td>Remarks</td>
    </tr>
    </thead>
    <tbody>
    <?php  while(!$getHv->EndOfSeek()){$listHv = $getHv->Row();?>
        <tr>
            <td><?php echo $listHv->item_desc;?></td>
            <td><?php echo $listHv->quantity;?></td>
            <td><?php echo $listHv->location;?></td>
            <td><?php echo $listHv->condition;?></td>
            <td><?php echo $listHv->remarks;?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>