<?php
require_once('mysql.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 1/11/2018
 * Time: 12:05 PM
 */

class Pmv extends  MySQL{
    /*
     * This function sends mails to specified emails
     * @param $partner is the implementing partner id
     * @param $programme is the programme id
     * @return html formatted title
     * */
    function fetchProjectListTitle($partner,$programme){

        $this->Query("SELECT name FROM implementing_partners WHERE id = $partner");
        $partRow = $this->Row();

        $this->Query("SELECT name FROM programmes WHERE id = $programme");
        $progRow = $this->Row();

        return '<tr>'.'<td colspan="8" style="text-align:center;"><strong>'.$partRow->name.'</strong>'.' ('.$progRow->name.') '.'</td>'.'</tr>';

    }

    /*
     * This function sends mails to specified emails
     * @param $projectID is the project id
     * @return number of PMVs under a particular project
     * */
    function countAddedPMVs($projectID){

        $this->Query("SELECT IFNULL(COUNT(id),0) AS pmvCount FROM pmv WHERE project_id = $projectID AND status = 'validated'");
        $pmvRow = $this->Row();
        $finalCount = $pmvRow->pmvCount;

        return $finalCount;

    }

    function getAccessServiceComment($pmvid,$accessServId){

        $this->Query("SELECT comment FROM pmv_access_services WHERE pmv_id = $pmvid AND access_service_id = $accessServId");
        $asrow = $this->Row();
        $thecomment = trim($asrow->comment);

        return $thecomment;

    }

    function getQualityServiceComment($pmvid,$accessServId){

        $this->Query("SELECT comment FROM pmv_quality_services WHERE pmv_id = $pmvid AND quality_service_id = $accessServId");
        $asrow = $this->Row();
        $thecomment = trim($asrow->comment);

        return $thecomment;

    }

    function getUtilServiceComment($pmvid,$utilId){

        $this->Query("SELECT comment FROM pmv_util_services WHERE pmv_id = $pmvid AND util_service_id = $utilId");
        $asrow = $this->Row();
        $thecomment = trim($asrow->comment);

        return $thecomment;

    }

    function getEnabEnvComment($pmvid,$enabEnvId){

        $this->Query("SELECT comment FROM pmv_enabling_env WHERE pmv_id = $pmvid AND enab_env_id = $enabEnvId");
        $asrow = $this->Row();
        $thecomment = trim($asrow->comment);

        return $thecomment;

    }

    function getStatRecords($pmvid,$enabEnvId){

        $this->Query("SELECT comment FROM pmv_statistics_records WHERE pmv_id = $pmvid AND stat_rec_id = $enabEnvId");
        $asrow = $this->Row();
        $thecomment = trim($asrow->comment);

        return $thecomment;

    }

    /*
    * This function checks required PMV number Vs Added PMVs
    * @param $projectID is the project id
    * @return open when there is room to add more and close when its reached its limit
    * */
    function checkPMVAdded($projectId){

        $this->Query("SELECT * FROM pmv WHERE project_id = $projectId");
        $resultCount = $this->RowCount();
        if($resultCount==false){
            $resultCount = 0;
        }

        $this->Query("SELECT pmv FROM activities WHERE id = $projectId");
        $pmvRow = $this->Row();
        $pmvVal = $pmvRow->pmv;

        $diff = $pmvVal - $resultCount;


        if($diff >= 0){
            return "open";
        }else{
            return "close";
        }

    }

    function getPMVDetails($id){
        $tableName = "pmv";
        $whereArray['id'] = $id;
        $this->Query( MySQL::BuildSQLSelect($tableName, $whereArray));
        return $this->Row();
    }

    function fetchOfficers($pmvid){
        $officers = "";
        $cnt = 0;
        $this->Query("SELECT * FROM pmv_officers LEFT JOIN staff_pdetail ON pmv_officers.staff_id = staff_pdetail.empID WHERE pmv_id = $pmvid");

        while(!$this->EndOfSeek()){
            if($cnt > 0){
                $officers .= ', ';
            }
            $ofrow = $this->Row();
            $officers .= $ofrow->first_name.' '.$ofrow->last_name;
            $cnt++;
        }

        return $officers;

    }

    function getIPName($ipid){

        $this->Query("SELECT name FROM implementing_partners WHERE id = $ipid");
        $ipRow = $this->Row();
        $ipname = $ipRow->name;

        return $ipname;

    }

    function fetchPrevRecommOfficers($rid){
        $pofficers = "";
        $cnt = 0;
        $this->Query("SELECT * FROM pmv_prev_officers LEFT JOIN staff_pdetail ON pmv_prev_officers.staff_id = staff_pdetail.empID WHERE recomm_id = $rid");

        while(!$this->EndOfSeek()){
            if($cnt > 0){
                $pofficers .= ', ';
            }
            $ofrow = $this->Row();
            $pofficers .= $ofrow->first_name.' '.$ofrow->last_name;
            $cnt++;
        }

        return $pofficers;

    }

    function getProgramName($programId){

        $this->Query("SELECT name FROM programmes WHERE id = $programId");
        $proww = $this->Row();
        $proname = $proww->name;

        return $proname;

    }
}
?>