<?php
session_start();
require_once('../../classes/mysql.class.php');


$update = new MySQL();

if(isset($_POST['indic']) && isset($_POST['baseline'])){

    $valuesArray['indicator'] = MySQL::SQLValue($_POST['indic']);
    $valuesArray['baseline'] = MySQL::SQLValue($_POST['baseline']);
    $valuesArray['target'] = MySQL::SQLValue($_POST['target']);
    $valuesArray['mov'] = MySQL::SQLValue($_POST['mov']);
    $valuesArray['status'] = MySQL::SQLValue("active");
    $valuesArray['pmv_id'] = MySQL::SQLValue($_SESSION['hems_active_pmv']);
    $valuesArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
    $valuesArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

    $sql = MySQL::BuildSQLInsert("pmv_prog_ref_info", $valuesArray);

    $result = $update->Query($sql);

    if($result){

        $pmvid = $_SESSION['hems_active_pmv'];
        $getPri = new MySQL();
        $getPri->Query("SELECT * FROM pmv_prog_ref_info WHERE pmv_id = $pmvid");

    }else{

        echo  "fail";exit;
    }


}
?>

<table class="table table-bordered table-responsive table-striped">
    <thead>
    <tr>
        <td>Indicator</td>
        <td>Baseline</td>
        <td>Target</td>
        <td>Method Of Verification</td>
    </tr>
    </thead>
    <tbody>
    <?php  while(!$getPri->EndOfSeek()){$listPri = $getPri->Row();?>
        <tr>
            <td><?php echo $listPri->indicator;?></td>
            <td><?php echo $listPri->baseline;?></td>
            <td><?php echo $listPri->target;?></td>
            <td><?php echo $listPri->mov;?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>