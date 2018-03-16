<?php
    session_start();
    require_once('../../classes/mysql.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 2/4/2018
 * Time: 1:02 PM
 */

    $update = new MySQL();

    if(isset($_POST['pmvid'])) {

        $pmvid = $_POST['pmvid'];

        $valuesArray['status'] = MySQL::SQLValue("approved");
        $valuesArray['approved_by'] = MySQL::SQLValue($_SESSION['hems_User']['user_id']);
        $valuesArray['approved_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

        $whereArray['id'] = $pmvid;

        $sql = MySQL::BuildSQLUpdate("pmv",$valuesArray,$whereArray);

        $resp = $update->Query($sql);

        if($resp){
            echo "ok";exit;
        }else{
            echo "fail";exit;
        }

    }
?>