<?php
require_once('../../classes/mysql.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 4/14/2018
 * Time: 2:19 PM
 */

$update = new MySQL();

    if(isset($_POST['recid'])){

        if(isset($_POST['comments']) && !empty($_POST['comments'])){
            $valuesArray['comment'] = MySQL::SQLValue($_POST['comments']);
        }

        $valuesArray['proc_status'] =  MySQL::SQLValue("closed");


        $whereArray['id'] = $_POST['recid'];
        $sql = MySQL::BuildSQLUpdate("pmv_followup_actions", $valuesArray,$whereArray);
        $result = $update->Query($sql);

        if($result){
            echo "ok";exit;
        }else{
            echo "fail";exit;
        }

    }
?>