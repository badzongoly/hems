<?php
session_start();
require_once('../../classes/mysql.class.php');


$update = new MySQL();

if(isset($_POST['pri'])){

    $sid = $_POST['pri'];
    $sql = "DELETE FROM pmv_prog_ref_info WHERE id = $sid";

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
        <td>&nbsp;</td>
    </tr>
    </thead>
    <tbody>
    <?php  while(!$getPri->EndOfSeek()){$listPri = $getPri->Row();?>
        <tr>
            <td><?php echo $listPri->indicator;?></td>
            <td><?php echo $listPri->baseline;?></td>
            <td><?php echo $listPri->target;?></td>
            <td><?php echo $listPri->mov;?></td>
            <td><a id="del_pri" href="" name="<?php echo $listPri->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>