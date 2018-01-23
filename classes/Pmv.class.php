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

        $this->Query("SELECT IFNULL(COUNT(id),0) AS pmvCount FROM pmv WHERE project_id = $projectID");
        $pmvRow = $this->Row();
        $finalCount = $pmvRow->pmvCount;

        return $finalCount;

    }
}
?>