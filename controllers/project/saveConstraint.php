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

    if(isset($_POST['constraints']) && isset($_POST['constraints'])){

        $pmvid = $_SESSION['hems_active_pmv'];

        $valuesArray['pmv_id'] = MySQL::SQLValue($pmvid);
        $valuesArray['constraint'] = MySQL::SQLValue($_POST['constraints']);
        $valuesArray['lesson_learned'] = MySQL::SQLValue($_POST['less_learned']);
        $valuesArray['opportunity'] = MySQL::SQLValue($_POST['opportunity']);

        $sql = MySQL::BuildSQLInsert("pmv_constraints", $valuesArray);

        $result = $insert->Query($sql);

        if($result){

            $getList->Query("SELECT * FROM pmv_constraints WHERE pmv_id = $pmvid");

        }else{

            echo  "fail";exit;
        }


    }

?>

<table class="table table-bordered table-responsive table-striped">
    <thead>
    <tr>
        <td>Constraints</td>
        <td>Lessons Learned</td>
        <td>Opportunity</td>
        <td>&nbsp;</td>
    </tr>
    </thead>
    <tbody>
    <?php while(!$getList->EndOfSeek()){$listItem = $getList->Row();?>
        <tr>
            <td><?php echo $listItem->constraint;?></td>
            <td><?php echo $listItem->lesson_learned;?></td>
            <td><?php echo $listItem->opportunity;?></td>
            <td><a id="del_cons" href="" name="<?php echo $listItem->id;?>" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>