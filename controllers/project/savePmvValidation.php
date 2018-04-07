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

        $valuesArray['status'] = MySQL::SQLValue("validated");
        $valuesArray['validated_by'] = MySQL::SQLValue($_SESSION['hems_User']['user_id']);
        $valuesArray['validated_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

        $whereArray['id'] = $pmvid;

        $sql = MySQL::BuildSQLUpdate("pmv_light",$valuesArray,$whereArray);

        $resp = $update->Query($sql);

        if($resp){
            echo "ok";exit;
        }else{
            echo "fail";exit;
        }

    }
?>