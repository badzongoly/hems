<?php
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 1/23/2018
 * Time: 1:51 PM
 */

session_start();
require_once('../../classes/mysql.class.php');
require_once('../../classes/Pmv.class.php');

$insert = new MySQL();

if(isset($_POST['v_date']) && !empty($_POST['v_date'])){

    $officerArray = array();
    $officerArray = $_POST['rec_officers'];

    $valuesArray['date_of_visit'] = MySQL::SQLValue($_POST['v_date']);
    if(isset($_POST['prevRecc']) && !empty($_POST['prevRecc'])){
        $valuesArray['recomm'] = MySQL::SQLValue($_POST['prevRecc']);
    }
    if(isset($_POST['prevStatus']) && !empty($_POST['prevStatus'])) {
        $valuesArray['impl'] = MySQL::SQLValue($_POST['prevStatus']);
    }
    $valuesArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
    $valuesArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

    $sql = MySQL::BuildSQLInsert("pmv_prev_recomm", $valuesArray);

    $result = $insert->Query($sql);

    if($result){

        foreach($officerArray as $officer){

            $offArray['pmv_id'] = MySQL::SQLValue($_SESSION['hems_active_pmv']);
            $offArray['staff_id'] = MySQL::SQLValue($officer);
            $offArray['created_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
            $offArray['created_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

            $offsql = MySQL::BuildSQLInsert("pmv_prev_officers", $offArray);
            $insert->Query($offsql);

        }

        echo "ok";exit;

    }else{

        echo  "fail";exit;
    }


}
?>