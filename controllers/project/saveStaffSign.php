<?php
session_start();
require_once('../../classes/mysql.class.php');
require_once('../../classes/Pmv.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 4/7/2018
 * Time: 1:47 PM
 */


if(isset($_POST['officers'])){
    $insert = new MySQL();
    $officerArray = array();
    $officerArray = $_POST['officers'];

    $pmvid = $_SESSION['hems_active_pmv'];

    $delete = new MySQL();
    $delete->Query("DELETE FROM pmv_officers WHERE pmv_id = $pmvid");

    foreach($officerArray as $officer){

        $offArray['pmv_id'] = MySQL::SQLValue($pmvid);
        $offArray['staff_id'] = MySQL::SQLValue($officer);
        $offArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
        $offArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

        $offsql = MySQL::BuildSQLInsert("pmv_officers", $offArray);
        $insert->Query($offsql);

    }

    $getOffs = new MySQL();
    $getOffs->Query("SELECT * FROM pmv_officers LEFT JOIN staff_pdetail ON pmv_officers.staff_id = staff_pdetail.empID WHERE pmv_id = $pmvid");

}

?>
<table class="table table-bordered table-responsive table-striped" align="center" style="width:500px;">
    <thead>
    <tr>
        <td>#</td>
        <td>Name</td>
    </tr>
    </thead>
    <tbody>
    <?php $countit = 1; while(!$getOffs->EndOfSeek()){$listOffs = $getOffs->Row();?>
        <tr>
            <td><?php echo $countit;?></td>
            <td><?php echo $listOffs->first_name.' '.$listOffs->last_name;?></td>
        </tr>
        <?php $countit++; } ?>
    </tbody>
</table>