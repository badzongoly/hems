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
    private $pm = array('Quarterly'=>4,'3 or more'=>3,'1 or more'=>1,'2 or more'=>2,'4 or more'=>4,'NULL'=>0);
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

        $sql = MySQL::BuildSQLInsert('activities',$valuesArray);

        $check = $this->Query($sql);
        if($check){
            return "ok";
        }
        else{
            return "error";
        }
    }
    public function getProjects(){
        $this->Query('SELECT p.id, p.name AS project, i.name AS partner, pr.name AS programme,p.spot_check,p.pmv,p.audit,p.start_date,p.duration,p.status FROM activities p INNER JOIN implementing_partners i ON i.id = p.partner_id INNER JOIN programmes pr ON  pr.id = p.programme_id ');
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
        $sql = MySQL::BuildSQLDelete('activities',$whereArray);
        $check = $this->Query($sql);
        if($check){
            return $this->getProjects();
        }else{
            return "error";
        }
    }
    public function getPMV($val){
        $return ='';
        foreach ($this->pm as $pmv => $finalValue){
            if($val === $pmv){
                $return = $finalValue;
            }
            elseif(empty($val))
            {
                $return = 0;
            }
        }
        return $return;
    }
    public function getConfirmationPMV(){
        $this->Query('Select p.name,s.risk_rating,s.amount,s.pmv,s.date,o.name AS outcome_area from pmv_sheet s INNER JOIN implementing_partners p ON p.ip_code = s.vendor LEFT JOIN outcomes o ON o.code = s.outcome_area');
        $output = '<table class="table table-striped table-hover table-email table-bordered" style="" align="center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> VENDOR </th>
                                    <th> RISK RATING</th>
                                    <th>OUTCOME AREA</th>
                                    <th>AMOUNT</th>
                                    <th> REQUIRED PMV</th>
                                    <th>DATE</th>
                                </tr>
                                </thead>
                                <tbody>';
        $counter = 1;while(!$this->EndOfSeek()){
            $row = $this->Row();
            $output.='<tr>
                                        <td>'.$counter.'</td>
                                        <td>'.$row->name.'</td>
                                        <td>'.$row->risk_rating.'</td>
                                        <td>'.$row->outcome_area.'</td>
                                        <td>'.number_format($row->amount,2).'</td> 
                                        <td>'.$row->pmv .'</td>
                                        <td>'.$row->date.'</td> 
                                     
                                    </tr>';
       $counter++; }
        $output.='<!--<tr>
                                    <td colspan="2"><a href="#" id="confirm" class="btn btn-success"><i class="fa fa-check"></i>Confirm </a></td>
                                    <td colspan="2"><a href="#" id="cancel" class="btn btn-danger"><i class="fa fa-times"></i> Cancel </td>
                                    </tr>--></tbody></table>';
        echo $output;

    }
    public function getConfirmationSPOTCHECK(){
        $this->Query('Select  p.name,s.risk_rating,s.amount,s.spot_checks,s.date from spot_checks s INNER JOIN implementing_partners p ON p.ip_code = s.vendor');
        $output = '<table class="table table-striped table-hover table-email table-bordered" style="" align="center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> VENDOR </th>
                                    <th> RISK RATING</th>
                                    <th>AMOUNT</th>
                                    <th> REQUIRED SPOT CHECK</th>
                                    <th>DATE</th>
                                </tr>
                                </thead>
                                <tbody>';
        $counter = 1;while(!$this->EndOfSeek()){
            $row = $this->Row();
            $output.='<tr>
                                        <td>'.$counter.'</td>
                                        <td>'.$row->name.'</td>
                                        <td>'.$row->risk_rating.'</td>
                                        <td>'.number_format($row->amount,2).'</td> 
                                        <td>'.$row->spot_checks .'</td>
                                        <td>'.$row->date.'</td> 
                                     
                                    </tr>';
       $counter++; }
        $output.='<!--<tr>
                                    <td colspan="2"><a href="#" id="confirm" class="btn btn-success"><i class="fa fa-check"></i>Confirm </a></td>
                                    <td colspan="2"><a href="#" id="cancel" class="btn btn-danger"><i class="fa fa-times"></i> Cancel </td>
                                    </tr>--></tbody></table>';
        echo $output;

    } public function getConfirmation(){
        $this->Query('Select * from activities_trans WHERE  status = "New"');
        $output = '<table class="table table-striped table-hover table-email table-bordered" style="width: 700px;" align="center">
                                <thead>
                                <tr>
                                    <th> IP CODE</th>
                                    <th>Number of PMV(S)</th>
                                    <th>Number of Spot check(S)</th>
                                    <th>Number of Audit(S)</th>
                                </tr>
                                </thead>
                                <tbody>';
        while(!$this->EndOfSeek()){
            $row = $this->Row();
            $output.='<tr>
                                        <td>'.$row->partner_id.'</td>
                                        <td>'.$row->pmv.'</td>
                                        <td>'.$row->spot_check.'</td>
                                        <td>'.$row->audit.'</td> 
                                     
                                    </tr>';
        }
        $output.='<!--<tr>
                                    <td colspan="2"><a href="#" id="confirm" class="btn btn-success"><i class="fa fa-check"></i>Confirm </a></td>
                                    <td colspan="2"><a href="#" id="cancel" class="btn btn-danger"><i class="fa fa-times"></i> Cancel </td>
                                    </tr></tbody></table>-->';
        echo $output;

    }
    public function deleteActivities(){
        $check = $this->Query("Delete  From activities_trans WHERE status ='New'");
        if($check){
            echo "ok";
        }else{
            echo "error";
        }
    }
  public function moveActivities(){
        $object = new MySQL();
        $check = $this->Query("Select * From activities_trans WHERE status ='New'");
        $table = 'activities';
        $sql = '';
        if($check){
            while (!$this->EndOfSeek()){
                $row = $this->Row();

                $valuesArray['partner_id'] = MySQL::SQLValue($row->partner_id);
                $valuesArray['pmv'] = MySQL::SQLValue($row->pmv);
                $valuesArray['spot_check'] =MySQL::SQLValue($row->spot_check);
                $valuesArray['audit'] = MySQL::SQLValue($row->audit);
                $valuesArray['value_month'] = MySQL::SQLValue($row->value_month);
                $valuesArray['value_year'] = MySQL::SQLValue($row->value_year);
                $valuesArray['status'] = MySQL::SQLValue('Active');
                $valuesArray['created_by']=MySQL::SQLValue($_SESSION['hems_User']['user_id']);
                if(empty($sql)) {
                    $sql = MySQL::BuildSQLInsert($table, $valuesArray);
                }else{
                    $sql.=",".substr(MySQL::BuildSQLInsert($table, $valuesArray),129);
                }
            }

            $check = $this->Query($sql);
            if($check){
                $this->Query("Delete  From activities_trans WHERE status ='New'");
                return 'ok';
            }else{
                return 'error';
            }

        }else{
            return 'empty';
        }
    }
    function getPMVCalculation($cash, $risk){
        $pmv = 0;
        if($cash<= 50000){
            $pmv = 1;
        }elseif( $cash <= 100000){
            $pmv = 1;
        }elseif ($cash<=350000 && ($risk=="Low" || $risk =="Moderate")){
            $pmv = 1;
        }elseif ($cash<=350000 && ($risk=="Significant" || $risk =="High")){
            $pmv = 2;
        }elseif ($cash<=500000 && ($risk=="Low" || $risk =="Moderate")){
            $pmv = 2;
        }elseif ($cash<=500000 && ($risk=="Significant" || $risk =="High")){
            $pmv = 4;
        }elseif ($cash >500000 && ($risk=="Low" || $risk =="Moderate")){
            $pmv = 2;
        }elseif ($cash >500000 && ($risk=="Significant" || $risk =="High")){
            $pmv = 4;
        }
        return $pmv;
    }    function getSpotCheckCalculation($cash, $risk){
        $pmv = 0;
        if($cash<= 50000){
            $pmv = 0;
        }elseif( $cash <= 100000){
            $pmv = 1;
        }elseif ($cash<=350000 && ($risk=="Low" || $risk =="Moderate")){
            $pmv = 1;
        }elseif ($cash<=350000 && ($risk=="Significant" || $risk =="High")){
            $pmv = 2;
        }elseif ($cash<=500000 && ($risk=="Low" || $risk =="Moderate")){
            $pmv = 2;
        }elseif ($cash<=500000 && ($risk=="Significant" || $risk =="High")){
            $pmv = 4;
        }elseif ($cash >500000 && ($risk=="Low" || $risk =="Moderate")){
            $pmv = 2;
        }elseif ($cash >500000 && ($risk=="Significant" || $risk =="High")){
            $pmv = 4;
        }
        return $pmv;
    }
    function updateSpotCheck($id,$status,$purpose){
        $valuesArray['status'] = MySQL::SQLValue($status);
        if(!empty($purpose)){
            $valuesArray['reason'] = MySQL::SQLValue($purpose);
        }
        $whereArray['id'] = MySQL::SQLValue($id);
        $table = "spotcheck_light";
        $sql = MySQL::BuildSQLUpdate($table,$valuesArray,$whereArray);
        $check = $this->Query($sql);
        if($check){
            return 'ok';
        }else{
            return 'error';
        }

    }

}