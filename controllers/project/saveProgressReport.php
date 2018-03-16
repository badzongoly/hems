<?php
    session_start();
    require_once('../../classes/mysql.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 1/24/2018
 * Time: 6:15 AM
 */
    $update = new MySQL();

    if(isset($_POST['prog_reporting']) && !empty($_POST['prog_reporting'])){

        $pmvid = $_SESSION['hems_active_pmv'];


                $whereArray['id'] = $pmvid;

                $valuesArray['progress_reporting'] = MySQL::SQLValue($_POST['prog_reporting']);
                $usql = MySQL::BuildSQLUpdate("pmv", $valuesArray,$whereArray);

                $update->Query($usql);


        echo 'ok';exit;

    }


?>