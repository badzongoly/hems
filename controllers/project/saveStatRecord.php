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

    if(isset($_POST['statRec']) && !empty($_POST['statRec'])){

        $statRecord = array();
        $statRecord = $_POST['statRec'];
        $pmvid = $_SESSION['hems_active_pmv'];

        $getSelections = new MySQL();
        $getSelections->Query("SELECT * FROM pmv_statistics_records WHERE pmv_id = $pmvid");
        $selCount = $getSelections->RowCount();

        $selsrArray = array();

        if($selCount){
            while(!$getSelections->EndOfSeek()){
                $srrow = $getSelections->Row();
                $selsrArray[] = $srrow->stat_rec_id;
            }
        }

        foreach($statRecord as $statrec){

            if(!in_array($statrec,$selsrArray)){
                $valuesArray['pmv_id'] = MySQL::SQLValue($pmvid);
                $valuesArray['stat_rec_id'] = MySQL::SQLValue($statrec);
                $valuesArray['comment'] = MySQL::SQLValue($_POST['srcomment'][$statrec]);
                $valuesArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
                $valuesArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

                $sql = MySQL::BuildSQLInsert("pmv_statistics_records", $valuesArray);
                $insert->Query($sql);

            }elseif(in_array($statrec,$selArray)){

                $whereArray['pmv_id'] = $pmvid;
                $whereArray['stat_rec_id'] = $statrec;

                $valuesArray['comment'] = MySQL::SQLValue($_POST['srcomment'][$statrec]);
                $usql = MySQL::BuildSQLUpdate("pmv_statistics_records", $valuesArray,$whereArray);

                $update->Query($usql);
            }

        }

        echo 'ok';exit;

    }


?>