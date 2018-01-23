<?php
    session_start();
    require_once('../../classes/mysql.class.php');
    require_once('../../classes/Pmv.class.php');

    $insert = new MySQL();

    if(isset($_POST['section']) && isset($_POST['region'])){

        $officerArray = array();
        $officerArray = $_POST['officers'];

        $valuesArray['section'] = MySQL::SQLValue($_POST['section']);
        $valuesArray['project_id'] = MySQL::SQLValue($_POST['pid']);
        $valuesArray['visit_startdate'] = MySQL::SQLValue($_POST['start']);
        $valuesArray['visit_enddate'] = MySQL::SQLValue($_POST['end']);
        $valuesArray['region'] = MySQL::SQLValue($_POST['region']);
        $valuesArray['district'] = MySQL::SQLValue($_POST['district']);
        $valuesArray['sub_district'] = MySQL::SQLValue($_POST['subdistrict']);
        $valuesArray['community'] = MySQL::SQLValue($_POST['district']);
        $valuesArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
        $valuesArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

        $sql = MySQL::BuildSQLInsert("pmv", $valuesArray);

        $result = $insert->Query($sql);

        if($result){
            $_SESSION['hems_active_pmv'] = $insert->GetLastInsertID();

            foreach($officerArray as $officer){

                $offArray['pmv_id'] = MySQL::SQLValue($_SESSION['hems_active_pmv']);
                $offArray['staff_id'] = MySQL::SQLValue($officer);
                $offArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
                $offArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

                $offsql = MySQL::BuildSQLInsert("pmv_officers", $offArray);
                $insert->Query($offsql);

            }

            echo "ok";exit;

        }else{

            echo  "fail";exit;
        }


    }
?>