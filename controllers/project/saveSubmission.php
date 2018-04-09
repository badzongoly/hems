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

    if(isset($_POST['whatToDo']) && $_POST['whatToDo']=="submitThisForm") {

        $pmvid = $_SESSION['hems_active_pmv'];

        if($pmvid==0){
            echo "zero";exit;
        }

        $valuesArray['status'] = MySQL::SQLValue("submitted");
        $valuesArray['submitted_by'] = MySQL::SQLValue($_SESSION['hems_User']['user_id']);
        $valuesArray['submitted_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

        $whereArray['id'] = $pmvid;

        $sql = MySQL::BuildSQLUpdate("pmv_light",$valuesArray,$whereArray);
        $resp = $update->Query($sql);

        if($resp){
            $_SESSION['hems_active_pmv'] = 0;
            echo "ok";exit;
        }else{
            echo "fail";exit;
        }

    }
?>