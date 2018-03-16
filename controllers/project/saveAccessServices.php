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

    if(isset($_POST['aserv']) && !empty($_POST['aserv'])){

        $accessServices = array();
        $accessServices = $_POST['aserv'];
        $pmvid = $_SESSION['hems_active_pmv'];

        $getSelections = new MySQL();
        $getSelections->Query("SELECT * FROM pmv_access_services WHERE pmv_id = $pmvid");
        $selCount = $getSelections->RowCount();

        $selArray = array();

        if($selCount){
            while(!$getSelections->EndOfSeek()){
                $srow = $getSelections->Row();
                $selArray[] = $srow->access_service_id;
            }
        }

        foreach($accessServices as $aservice){

            if(!in_array($aservice,$selArray)){
                $valuesArray['pmv_id'] = MySQL::SQLValue($pmvid);
                $valuesArray['access_service_id'] = MySQL::SQLValue($aservice);
                $valuesArray['comment'] = MySQL::SQLValue($_POST['comment'][$aservice]);
                $valuesArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
                $valuesArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

                $sql = MySQL::BuildSQLInsert("pmv_access_services", $valuesArray);
                $insert->Query($sql);

            }elseif(in_array($aservice,$selArray)){

                $whereArray['pmv_id'] = $pmvid;
                $whereArray['access_service_id'] = $aservice;

                $valuesArray['comment'] = MySQL::SQLValue($_POST['comment'][$aservice]);
                $usql = MySQL::BuildSQLUpdate("pmv_access_services", $valuesArray,$whereArray);

                $update->Query($usql);
            }

        }

        echo 'ok';exit;

    }


?>