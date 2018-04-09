<?php
session_start();
require_once('../../classes/mysql.class.php');

/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 1/29/2018
 * Time: 6:58 PM
 */
$update = new MySQL();
$getList = new MySQL();

if(isset($_POST['rec'])){

    $sid = $_POST['rec'];
    $sql = "DELETE FROM pmv_followup_actions WHERE id = $sid";

    $pmvid = $_SESSION['hems_active_pmv'];

    $result = $update->Query($sql);

    if($result){

        $getList->Query("SELECT * FROM pmv_followup_actions WHERE pmv_id = $pmvid");

    }else{

        echo  "fail";exit;
    }


}

?>

<table class="table table-bordered table-responsive table-striped">
    <thead>
    <tr>
        <td>Findings</td>
        <td>Recommended Action</td>
        <td>By Whom</td>
        <td>By When</td>
        <td>&nbsp;</td>
    </tr>
    </thead>
    <tbody>
    <?php while(!$getList->EndOfSeek()){$listItem = $getList->Row();?>
        <tr>
            <td><?php echo $listItem->findings;?></td>
            <td><?php echo $listItem->recomm_action;?></td>
            <td><?php echo $listItem->by_whom;?></td>
            <td><?php echo $listItem->by_when;?></td>
            <td><a id="del_rec" href="" name="<?php echo $listItem->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>