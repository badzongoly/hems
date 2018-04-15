<?php
    require_once('../../classes/mysql.class.php');

    if(isset($_POST['secCheck'])){
        $secArray =  array();
        $secArray = $_POST['secCheck'];
        $secArraySize = sizeof($secArray);

        $queryWhere = '(';
        $count = 0;

         foreach($secArray as $asect){

             $queryWhere .= " pmv_sheet.outcome_area = $asect ";
             if($count < ($secArraySize -1)){
                 $queryWhere .= ' OR ';
             }
             $count++;

         }

        $queryWhere .= ' )';


        $getPmvComp = new MySQL();
        $compQuery = "SELECT IFNULL(COUNT(pmv_light.id),0) AS completed FROM pmv_light
                            LEFT JOIN pmv_sheet ON pmv_light.pmv_sheet_id = pmv_sheet.id
                            WHERE pmv_light.status = 'validated' AND $queryWhere";

        $getPmvComp->Query($compQuery);
        $compRow = $getPmvComp->Row();
        $pmvComp = $compRow->completed;

        $getPmvReq = new MySQL();
        $reQuery = "SELECT IFNULL(SUM(pmv_sheet.pmv),0) AS required FROM pmv_sheet WHERE $queryWhere";

        $getPmvReq->Query($reQuery);
        $reqRow = $getPmvReq->Row();
        $pmvReq = $reqRow->required;

    }
?>

<table class="table table-responsive">
    <tbody>
        <tr>
            <td colspan="2" style="text-align: center"><h4>PMVS</h4></td>
        </tr>
        <tr>
            <td>Required: <?php echo $pmvReq;?></td>
        </tr>
        <tr>
            <td>Completed : <?php echo $pmvComp;?></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center"><h4>Spot Checks</h4></td>
        </tr>
        <tr>
            <td>Required: <?php echo 0;?></td>
        </tr>
        <tr>
            <td>Completed : <?php echo 0;?></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center"><h4>Audit</h4></td>
        </tr>
        <tr>
            <td>Required: <?php echo 0;?></td>
        </tr>
        <tr>
            <td>Completed : <?php echo 0;?></td>
        </tr>
    </tbody>
</table>