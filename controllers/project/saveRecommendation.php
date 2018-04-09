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

    if(isset($_POST['recname']) && isset($_POST['recname'])){

        $pmvid = $_SESSION['hems_active_pmv'];

        $valuesArray['pmv_id'] = MySQL::SQLValue($pmvid);
        $valuesArray['rec_name'] = MySQL::SQLValue($_POST['recname']);
        $valuesArray['rec_desc'] = MySQL::SQLValue($_POST['recdesc']);



        $sql = MySQL::BuildSQLInsert("pmv_recommendation", $valuesArray);

        $result = $insert->Query($sql);

        if($result){

            $getList->Query("SELECT * FROM pmv_recommendation WHERE pmv_id = $pmvid");

        }else{

            echo  "fail";exit;
        }


    }

?>


<table class="table table-bordered table-responsive table-striped">
    <thead>
    <tr>
        <td>Recommendation Name</td>
        <td>Description</td>
        <td>&nbsp;</td>
    </tr>
    </thead>
    <tbody>
    <?php while(!$getList->EndOfSeek()){$listItem = $getList->Row();?>
        <tr>
            <td><?php echo $listItem->rec_name;?></td>
            <td><?php echo $listItem->rec_desc;?></td>
            <td><a id="del_rec" href="" name="<?php echo $listItem->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>