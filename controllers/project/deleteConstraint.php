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

if(isset($_POST['con'])){

    $sid = $_POST['con'];
    $sql = "DELETE FROM pmv_constraints WHERE id = $sid";

    $pmvid = $_SESSION['hems_active_pmv'];

    $result = $update->Query($sql);
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