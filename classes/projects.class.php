<?php

/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 13/01/2018
 * Time: 03:48 PM
 */
require_once('mysql.class.php');
class Project extends MySQL
{
    function __construct(){
        parent::__construct();
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function setProject($name,$description,$status,$partner_id,$programme_id,$pmv,$spot_check,$audit,$start_date,$duration){

        $valuesArray['name'] = MySQL::SQLValue($name);
        $valuesArray['description'] = MySQL::SQLValue($description);
        $valuesArray['partner_id'] = MySQL::SQLValue($partner_id);
        $valuesArray['programme_id'] = MySQL::SQLValue($programme_id);
        $valuesArray['pmv'] = MySQL::SQLValue($pmv);
        $valuesArray['spot_check'] = MySQL::SQLValue($spot_check);
        $valuesArray['audit'] = MySQL::SQLValue($audit);
        $valuesArray['start_date'] = MySQL::SQLValue(date('Y-m-d',strtotime($start_date)));
        $valuesArray['duration'] = MySQL::SQLValue($duration);
        $valuesArray['status'] = MySQL::SQLValue($status);
        $valuesArray['created_by'] = MySQL::SQLValue($_SESSION['hems_User']['user_id']);

        $sql = MySQL::BuildSQLInsert('project',$valuesArray);

        $check = $this->Query($sql);
        if($check){
            return "ok";
        }
        else{
            return "error";
        }
    }
    public function getProjects(){
        $this->Query('SELECT p.id, p.name AS project, i.name AS partner, pr.name AS programme,p.spot_check,p.pmv,p.audit,p.start_date,p.duration,p.status FROM project p INNER JOIN implementing_partners i ON i.id = p.partner_id INNER JOIN programmes pr ON  pr.id = p.programme_id ');
        $output = '<table class="table table-striped table-hover table-email table-bordered" style="width: 700px;" align="center">
                                <thead>
                                <tr>
                                    <th> Name</th>
                                    <th>Partner</th>
                                    <th>Programme</th>
                                    <th>Number of PMV(S)</th>
                                    <th>Number of Spot check(S)</th>
                                    <th>Number of Audit(S)</th>
                                    <th>Start Date</th>
                                    <th>duration</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>';
        while(!$this->EndOfSeek()){
            $row = $this->Row();
            $output.='<tr>
                                        <td>'.$row->project.'</td>
                                        <td>'.$row->partner.'</td>
                                        <td>'.$row->programme.'</td>
                                        <td>'.$row->pmv.'</td>
                                        <td>'.$row->spot_check.'</td>
                                        <td>'.$row->audit.'</td> 
                                        <td>'.$row->start_date.'</td>
                                        <td>'.$row->duration." Months".'</td>
                                        <td>'.$row->status.'</td>
                                        <td><a href="#" id="delete" data-id="'.$row->id.'" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a> </td>
                                    </tr>';
        }
        return $output;
    }


    public function deleteProject($id){
        $whereArray['id'] = $id;
        $sql = MySQL::BuildSQLDelete('project',$whereArray);
        $check = $this->Query($sql);
        if($check){
            return $this->getProjects();
        }else{
            return "error";
        }
    }


}