<?php

/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 13/01/2018
 * Time: 03:48 PM
 */
require_once('mysql.class.php');
class Settings extends MySQL
{
    function __construct(){
        parent::__construct();
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function setCountryOffice($name,$description,$status){

        $valuesArray['name'] = MySQL::SQLValue($name);
        $valuesArray['description'] = MySQL::SQLValue($description);
        $valuesArray['status'] = MySQL::SQLValue($status);
        $valuesArray['created_by'] = MySQL::SQLValue($_SESSION['hems_User']['user_id']);

        $sql = MySQL::BuildSQLInsert('country_office',$valuesArray);

        $check = $this->Query($sql);
        if($check){
            return "ok";
        }
        else{
            return "error";
        }
    }

    public function setProgrammes($name,$description,$status){

        $valuesArray['name'] = MySQL::SQLValue($name);
        $valuesArray['description'] = MySQL::SQLValue($description);
        $valuesArray['status'] = MySQL::SQLValue($status);
        $valuesArray['created_by'] = MySQL::SQLValue($_SESSION['hems_User']['user_id']);

        $sql = MySQL::BuildSQLInsert('programmes',$valuesArray);

        $check = $this->Query($sql);
        if($check){
            return "ok";
        }
        else{
            return "error";
        }
    }
    public function setOutcomes($name,$description,$status){

        $valuesArray['name'] = MySQL::SQLValue($name);
        $valuesArray['description'] = MySQL::SQLValue($description);
        $valuesArray['status'] = MySQL::SQLValue($status);
        $valuesArray['created_by'] = MySQL::SQLValue($_SESSION['hems_User']['user_id']);

        $sql = MySQL::BuildSQLInsert('outcomes',$valuesArray);
        $check = $this->Query($sql);
        if($check){
            return "ok";
        }
        else{
            return "error";
        }
    }
    public function setOutput($name,$description,$outcome_id){

        $valuesArray['name'] = MySQL::SQLValue($name);
        $valuesArray['description'] = MySQL::SQLValue($description);
        $valuesArray['outcome_id'] = MySQL::SQLValue($outcome_id);
        $valuesArray['created_by'] = MySQL::SQLValue($_SESSION['hems_User']['user_id']);

        $sql = MySQL::BuildSQLInsert('output',$valuesArray);

        $check = $this->Query($sql);
        if($check){
            return "ok";
        }
        else{
            return "error";
        }
    }    public function setImplementingPartners($name,$location,$status,$contactPerson,$phone,$email){

        $valuesArray['name'] = MySQL::SQLValue($name);
        $valuesArray['location'] = MySQL::SQLValue($location);
        $valuesArray['contact_person'] = MySQL::SQLValue($contactPerson);
        $valuesArray['email'] = MySQL::SQLValue($email);
        $valuesArray['phone'] = MySQL::SQLValue($phone);
        $valuesArray['status'] = MySQL::SQLValue($status);
        $valuesArray['created_by'] = MySQL::SQLValue($_SESSION['hems_User']['user_id']);

        $sql = MySQL::BuildSQLInsert('implementing_partners',$valuesArray);

        $check = $this->Query($sql);
        if($check){
            return "ok";
        }
        else{
            return "error";
        }
    }
    public function getCountryOffices(){
        $this->Query('Select * from country_office WHERE status = "Active"');
        $output = '<table class="table table-striped table-hover table-email table-bordered" style="width: 700px;" align="center">
                                <thead>
                                <tr>
                                    <th> Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>';
        while(!$this->EndOfSeek()){
            $row = $this->Row();
            $output.='<tr>
                                        <td>'.$row->name.'</td>
                                        <td>'.$row->description.'</td>
                                        <td>'.$row->status.'</td>
                                        <td><a href="#" id="delete" data-id="'.$row->id.'" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a> </td>
                                    </tr>';
        }
        return $output;
    }
    public function getProgrammes(){
        $this->Query('Select * from programmes WHERE status = "Active"');
        $output = '<table class="table table-striped table-hover table-email table-bordered" style="width: 700px;" align="center">
                                <thead>
                                <tr>
                                    <th> Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>';
        while(!$this->EndOfSeek()){
            $row = $this->Row();
            $output.='<tr>
                                        <td>'.$row->name.'</td>
                                        <td>'.$row->description.'</td>
                                        <td>'.$row->status.'</td>
                                        <td><a href="#" id="delete" data-id="'.$row->id.'" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a> </td>
                                    </tr>';
        }
        return $output;
    }
    public function getOutcomes(){
        $this->Query('Select * from outcomes WHERE status = "Active"');
        $output = '<table class="table table-striped table-hover table-email table-bordered" style="width: 700px;" align="center">
                                <thead>
                                <tr>
                                    <th> Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>';
        while(!$this->EndOfSeek()){
            $row = $this->Row();
            $output.='<tr>
                                        <td>'.$row->name.'</td>
                                        <td>'.$row->description.'</td>
                                        <td>'.$row->status.'</td>
                                        <td><a href="#" id="delete" data-id="'.$row->id.'" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a> </td>
                                    </tr>';
        }
        return $output;
    }
    public function getOutput(){
        $this->Query('SELECT p.id,p.name,p.description,c.`name`AS outcome FROM output p INNER JOIN outcomes c ON c.id = p.outcome_id');
        $output = '<table class="table table-striped table-hover table-email table-bordered" style="width: 700px;" align="center">
                                <thead>
                                <tr>
                                    <th> Name</th>
                                    <th>Description</th>
                                    <th>Outcome</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>';
        while(!$this->EndOfSeek()){
            $row = $this->Row();
            $output.='<tr>
                                        <td>'.$row->name.'</td>
                                        <td>'.$row->description.'</td>
                                        <td>'.$row->outcome.'</td>
                                        <td><a href="#" id="delete" data-id="'.$row->id.'" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a> </td>
                                    </tr>';
        }
        return $output;
    }
    public function getImplementingPartners(){
        $this->Query('Select * from implementing_partners WHERE status = "Active"');
        $output = '<table class="table table-striped table-hover table-email table-bordered" style="width: 80%;" align="center">
                                <thead>
                                <tr>
                                    <th> Name</th>
                                    <th>Contact Person</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>';
        while(!$this->EndOfSeek()){
            $row = $this->Row();
            $output.='<tr>
                                        <td>'.$row->name.'</td>
                                        <td>'.$row->contact_person.'</td>
                                        <td>'.$row->phone.'</td>
                                        <td>'.$row->email.'</td>
                                        <td>'.$row->location.'</td>
                                        <td>'.$row->status.'</td>
                                        <td><a href="#" id="delete" data-id="'.$row->id.'" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a> </td>
                                    </tr>';
        }
        return $output;
    }

    public function deleteCountryOffice($id){
        $whereArray['id'] = $id;
        $sql = MySQL::BuildSQLDelete('country_office',$whereArray);
        $check = $this->Query($sql);
        if($check){
            return $this->getCountryOffices();
        }else{
            return "error";
        }
    }

    public function deleteProgrammes($id){
        $whereArray['id'] = $id;
        $sql = MySQL::BuildSQLDelete('programmes',$whereArray);
        $check = $this->Query($sql);
        if($check){
            return $this->getProgrammes();
        }else{
            return "error";
        }
    }
    public function deleteOutcome($id){
        $whereArray['id'] = $id;
        $sql = MySQL::BuildSQLDelete('outcomes',$whereArray);
        $check = $this->Query($sql);
        if($check){
            return $this->getOutcomes();
        }else{
            return "error";
        }
    }public function deleteOutput($id){
        $whereArray['id'] = $id;
        $sql = MySQL::BuildSQLDelete('output',$whereArray);
        $check = $this->Query($sql);
        if($check){
            return $this->getOutput();
        }else{
            return "error";
        }
    }
    public function deleteImplementingPartners($id){
        $whereArray['id'] = $id;
        $sql = MySQL::BuildSQLDelete('implementing_partners',$whereArray);
        $check = $this->Query($sql);
        if($check){
            return $this->getImplementingPartners();
        }else{
            return "error";
        }
    }

    public function viewAssignments($id){
        $this->Query('Select * from programmes p INNER JOIN programmes_partners pp ON pp.programme_id =p.id WHERE pp.partner_id ='.$id);
        if($this->RowCount()>0) {
            $output = '<table class="table table-striped table-hover table-email table-bordered" style="width: 80%;" align="center">
 <thead>
                                <tr>
                                <th>#</th>
                                    <th> Programme Name</th>
                                </tr>
                                </thead>
                                <tbody>';
            $counter=1;
            while (!$this->EndOfSeek()) {
                $row = $this->Row();
                $output .= '<tr>
<td>'.$counter.'</td>
                                        <td>' . $row->name . '</td>
                                    </tr>';
            $counter++;}
        }else{
            $output = 'no_data';
        }
        return $output;
    }
    public function makeAssignment($programme_id,$partner_id){
        $valuesArray['programme_id'] = MySQL::SQLValue($programme_id);
        $valuesArray['partner_id'] = MySQL::SQLValue($partner_id);
        $sql = MySQL::BuildSQLSelect('programmes_partners',$valuesArray);
        $this->Query($sql);
        if($this->RowCount()>0){
            return "exists";
        }else{
            $sql = MySQL::BuildSQLInsert('programmes_partners',$valuesArray);

            $check =$this->Query($sql);
            if($check) {
                return "ok";
            }else{
                return "error";
            }
        }
    }

}