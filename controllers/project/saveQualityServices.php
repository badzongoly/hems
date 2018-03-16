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

    if(isset($_POST['qserv']) && !empty($_POST['qserv'])){

        $qualServices = array();
        $qualServices = $_POST['qserv'];
        $pmvid = $_SESSION['hems_active_pmv'];

        $getSelections = new MySQL();
        $getSelections->Query("SELECT * FROM pmv_quality_services WHERE pmv_id = $pmvid");
        $selCount = $getSelections->RowCount();

        $selArray = array();

        if($selCount){
            while(!$getSelections->EndOfSeek()){
                $srow = $getSelections->Row();
                $selArray[] = $srow->quality_service_id;
            }
        }

        foreach($qualServices as $qservice){

            if(!in_array($qservice,$selArray)){
                $valuesArray['pmv_id'] = MySQL::SQLValue($pmvid);
                $valuesArray['quality_service_id'] = MySQL::SQLValue($qservice);
                $valuesArray['comment'] = MySQL::SQLValue($_POST['qcomment'][$qservice]);
                $valuesArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
                $valuesArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

                $sql = MySQL::BuildSQLInsert("pmv_quality_services", $valuesArray);
                $insert->Query($sql);

            }elseif(in_array($qservice,$selArray)){

                $whereArray['pmv_id'] = $pmvid;
                $whereArray['quality_service_id'] = $qservice;

                $valuesArray['comment'] = MySQL::SQLValue($_POST['qcomment'][$qservice]);
                $usql = MySQL::BuildSQLUpdate("pmv_quality_services", $valuesArray,$whereArray);

                $update->Query($usql);
            }

        }

        echo 'ok';exit;

    }


?>