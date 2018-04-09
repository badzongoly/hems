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

if(isset($_POST['si'])){

    $sid = $_POST['si'];
    $sql = "DELETE FROM pmv_status_indicators WHERE id = $sid";

    $pmvid = $_SESSION['hems_active_pmv'];

    $result = $update->Query($sql);

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