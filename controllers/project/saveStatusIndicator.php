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

    if(isset($_POST['progress']) && isset($_POST['indicators'])){

        $pmvid = $_SESSION['hems_active_pmv'];

        $valuesArray['pmv_id'] = MySQL::SQLValue($pmvid);
        $valuesArray['progress'] = MySQL::SQLValue($_POST['progress']);
        $valuesArray['indicators'] = MySQL::SQLValue($_POST['indicators']);



        $sql = MySQL::BuildSQLInsert("pmv_status_indicators", $valuesArray);

        $result = $insert->Query($sql);

        if($result){

            $getList->Query("SELECT * FROM pmv_status_indicators WHERE pmv_id = $pmvid");

        }else{

            echo  "fail";exit;
        }


    }

?>

<table class="table table-bordered table-responsive table-striped">
    <thead>
    <tr>
        <td>Indicators</td>
        <td>Progress</td>
        <td>&nbsp;</td>
    </tr>
    </thead>
    <tbody>
    <?php while(!$getList->EndOfSeek()){$listItem = $getList->Row();?>
        <tr>
            <td><?php echo $listItem->indicators;?></td>
            <td><?php echo $listItem->progress;?></td>
            <td><a id="del_si" href="" name="<?php echo $listItem->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>