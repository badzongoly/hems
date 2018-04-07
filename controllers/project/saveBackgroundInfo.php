<?php
    session_start();
    require_once('../../classes/mysql.class.php');
    require_once('../../classes/Pmv.class.php');

    $insert = new MySQL();

    if(isset($_POST['objectives']) && isset($_POST['vendor'])){

        $valuesArray['objectives'] = MySQL::SQLValue($_POST['objectives']);
        $valuesArray['ip_code'] = MySQL::SQLValue($_POST['vendor']);
        $valuesArray['start_date'] = MySQL::SQLValue($_POST['start']);
        $valuesArray['end_date'] = MySQL::SQLValue($_POST['end']);
        $valuesArray['total_cash_contrib'] = MySQL::SQLValue($_POST['cash_contri']);
        $valuesArray['supplies'] = MySQL::SQLValue($_POST['supplies']);
        $valuesArray['access_serv'] = MySQL::SQLValue($_POST['access_input_serv']);
        $valuesArray['quality_serv'] = MySQL::SQLValue($_POST['qual_input_serv']);
        $valuesArray['util_serv'] = MySQL::SQLValue($_POST['uti_input_serv']);
        $valuesArray['enabling_environ'] = MySQL::SQLValue($_POST['enab_environ']);
        $valuesArray['overall_assess'] = MySQL::SQLValue($_POST['assessment']);
        $valuesArray['outstand_related'] = MySQL::SQLValue($_POST['outstanding']);
        $valuesArray['other_issues'] = MySQL::SQLValue($_POST['issues_concerns']);
        $valuesArray['status'] = MySQL::SQLValue('active');
        $valuesArray['pmv_sheet_id'] = MySQL::SQLValue($_POST['sheet_id']);
        $valuesArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
        $valuesArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

        $sql = MySQL::BuildSQLInsert("pmv_light", $valuesArray);

        $result = $insert->Query($sql);

        if($result){
            $_SESSION['hems_active_pmv'] = $insert->GetLastInsertID();
            echo "ok";exit;

        }else{

            echo  "fail";exit;
        }


    }
?>