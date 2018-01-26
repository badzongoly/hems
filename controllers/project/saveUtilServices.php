<?php
    session_start();
    require_once('../../classes/mysql.class.php');
    require_once('../../classes/Pmv.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 1/24/2018
 * Time: 6:15 AM
 */
    $insert = new MySQL();
    $update = new MySQL();

    if(isset($_POST['userv']) && !empty($_POST['userv'])){

        $utilServices = array();
        $utilServices = $_POST['userv'];
        $pmvid = $_SESSION['hems_active_pmv'];

        $getSelections = new MySQL();
        $getSelections->Query("SELECT * FROM pmv_util_services WHERE pmv_id = $pmvid");
        $selCount = $getSelections->RowCount();

        $selArray = array();

        if($selCount){
            while(!$getSelections->EndOfSeek()){
                $srow = $getSelections->Row();
                $selArray[] = $srow->util_service_id;
            }
        }

        foreach($utilServices as $uservice){

            if(!in_array($uservice,$selArray)){
                $valuesArray['pmv_id'] = MySQL::SQLValue($pmvid);
                $valuesArray['util_service_id'] = MySQL::SQLValue($uservice);
                $valuesArray['comment'] = MySQL::SQLValue($_POST['ucomment'][$uservice]);
                $valuesArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
                $valuesArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

                $sql = MySQL::BuildSQLInsert("pmv_util_services", $valuesArray);
                $insert->Query($sql);

            }elseif(in_array($uservice,$selArray)){

                $whereArray['pmv_id'] = $pmvid;
                $whereArray['util_service_id'] = $uservice;

                $valuesArray['comment'] = MySQL::SQLValue($_POST['ucomment'][$uservice]);
                $usql = MySQL::BuildSQLUpdate("pmv_util_services", $valuesArray,$whereArray);

                $update->Query($usql);
            }

        }

        echo 'ok';exit;

    }


?>