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

    if(isset($_POST['enab']) && !empty($_POST['enab'])){

        $enablingEnv = array();
        $enablingEnv = $_POST['enab'];
        $pmvid = $_SESSION['hems_active_pmv'];

        $getSelections = new MySQL();
        $getSelections->Query("SELECT * FROM pmv_enabling_env WHERE pmv_id = $pmvid");
        $selCount = $getSelections->RowCount();

        $selenabArray = array();

        if($selCount){
            while(!$getSelections->EndOfSeek()){
                $evrow = $getSelections->Row();
                $selenabArray[] = $evrow->enab_env_id;
            }
        }

        foreach($enablingEnv as $enabe){

            if(!in_array($enabe,$selenabArray)){
                $valuesArray['pmv_id'] = MySQL::SQLValue($pmvid);
                $valuesArray['enab_env_id'] = MySQL::SQLValue($enabe);
                $valuesArray['comment'] = MySQL::SQLValue($_POST['encomment'][$enabe]);
                $valuesArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
                $valuesArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

                $sql = MySQL::BuildSQLInsert("pmv_enabling_env", $valuesArray);
                $insert->Query($sql);

            }elseif(in_array($enabe,$selArray)){

                $whereArray['pmv_id'] = $pmvid;
                $whereArray['enab_env_id'] = $enabe;

                $valuesArray['comment'] = MySQL::SQLValue($_POST['encomment'][$enabe]);
                $usql = MySQL::BuildSQLUpdate("pmv_enabling_env", $valuesArray,$whereArray);

                $update->Query($usql);
            }

        }

        echo 'ok';exit;

    }


?>