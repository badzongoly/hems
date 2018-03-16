<?php
session_start();
require_once('../../classes/mysql.class.php');


$update = new MySQL();

if(isset($_POST['intervention_value']) && isset($_POST['ip'])){

    if(isset($_POST['purpose']) && !empty($_POST['purpose'])){
        $valuesArray['purpose'] = MySQL::SQLValue($_POST['purpose']);
    }
    if(isset($_POST['rwo']) && !empty($_POST['rwo'])) {
        $valuesArray['related_workplan_output'] = MySQL::SQLValue($_POST['rwo']);
    }
    if(isset($_POST['rwa']) && !empty($_POST['rwa'])) {
        $valuesArray['related_workplan_act'] = MySQL::SQLValue($_POST['rwa']);
    }
    if(isset($_POST['prog_doc_name']) && !empty($_POST['prog_doc_name'])) {
        $valuesArray['prog_document_ref'] = MySQL::SQLValue($_POST['prog_doc_name']);
    }
    if(isset($_POST['pdout']) && !empty($_POST['pdout'])) {
        $valuesArray['prog_document_out'] = MySQL::SQLValue($_POST['pdout']);
    }
    if(isset($_POST['baseline']) && !empty($_POST['baseline'])) {
        $valuesArray['baseline'] = MySQL::SQLValue($_POST['baseline']);
    }
    if(isset($_POST['target']) && !empty($_POST['target'])) {
        $valuesArray['target'] = MySQL::SQLValue($_POST['target']);
    }
    if(isset($_POST['verification']) && !empty($_POST['verification'])) {
        $valuesArray['verification'] = MySQL::SQLValue($_POST['verification']);
    }
    $valuesArray['imp_partner'] = MySQL::SQLValue($_POST['ip']);

    if(isset($_POST['int_start']) && !empty($_POST['int_start'])) {
        $valuesArray['intervention_period_start'] = MySQL::SQLValue($_POST['int_start']);
    }
    if(isset($_POST['int_end']) && !empty($_POST['int_end'])) {
        $valuesArray['intervention_period_end'] = MySQL::SQLValue($_POST['int_end']);
    }
    if(isset($_POST['persons_to_meet']) && !empty($_POST['persons_to_meet'])) {
        $valuesArray['persons_to_meet'] = MySQL::SQLValue($_POST['persons_to_meet']);
    }
    if(isset($_POST['fv_date']) && !empty($_POST['fv_date'])) {
        $valuesArray['last_field_visit'] = MySQL::SQLValue($_POST['fv_date']);
    }
    $valuesArray['intervention_value'] = MySQL::SQLValue($_POST['intervention_value']);
    $valuesArray['updated_by'] =  MySQL::SQLValue($_SESSION['hems_User']['user_id']);
    $valuesArray['updated_on'] = MySQL::SQLValue(date('Y-m-d h:i:s'));

    $whereArray['id'] = $_SESSION['hems_active_pmv'];
    $sql = MySQL::BuildSQLUpdate("pmv", $valuesArray,$whereArray);

    $result = $update->Query($sql);

    if($result){

        echo "ok";exit;

    }else{

        echo  "fail";exit;
    }


}
?>