<?php
session_start();
require_once('../../classes/mysql.class.php');

/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 1/29/2018
 * Time: 6:58 PM
 */
$insert = new MySQL();
$getList = new MySQL();

if(isset($_POST['findings']) && isset($_POST['findings'])){

    $pmvid = $_SESSION['hems_active_pmv'];

    $valuesArray['pmv_id'] = MySQL::SQLValue($pmvid);
    $valuesArray['findings'] = MySQL::SQLValue($_POST['findings']);
    $valuesArray['recomm_action'] = MySQL::SQLValue($_POST['recact']);
    $valuesArray['by_whom'] = MySQL::SQLValue($_POST['by_whom']);
    $valuesArray['by_when'] = MySQL::SQLValue($_POST['by_when']);

    $sql = MySQL::BuildSQLInsert("pmv_followup_actions", $valuesArray);

    $result = $insert->Query($sql);

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
    </tr>
    </thead>
    <tbody>
    <?php while(!$getList->EndOfSeek()){$listItem = $getList->Row();?>
        <tr>
            <td><?php echo $listItem->findings;?></td>
            <td><?php echo $listItem->recomm_action;?></td>
            <td><?php echo $listItem->by_whom;?></td>
            <td><?php echo $listItem->by_when;?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>