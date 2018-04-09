<?php
session_start();
require_once('../../classes/mysql.class.php');


$update = new MySQL();

if(isset($_POST['hvi'])){

    $sid = $_POST['hvi'];
    $sql = "DELETE FROM pmv_hv_items WHERE id = $sid";

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
            <td><a id="del_hvi" href="" name="<?php echo $listHv->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>