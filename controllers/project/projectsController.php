<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 13/01/2018
 * Time: 03:47 PM
 */
require_once('../../classes/projects.class.php');
$object = new Project();
if(isset($_POST['do']) && $_POST['do'] == "CreateProject"){
    $check = $object->setProject($_POST['name'],$_POST['description'],$_POST['status'],$_POST['partner_id'],$_POST['programme_id'],$_POST['pmv'],$_POST['spot_check'],$_POST['audit'],$_POST['start_date'],$_POST['duration']);
    if($check == "ok"){
        echo $object->getProjects();exit;
    }else{
        echo "error";
    }
}

if(isset($_POST['id']) && isset($_POST['do_action']) && $_POST['do_action'] == "delete" ){
    echo $object->deleteProject($_POST['id']);exit;
}