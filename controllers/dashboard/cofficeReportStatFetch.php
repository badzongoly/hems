<?php
    require_once('../../classes/mysql.class.php');

    if(isset($_POST['filter']) && $_POST['filter']=='FetchCountryOffice'){

        $getPmvComp = new MySQL();
        $getPmvComp->Query("SELECT IFNULL(COUNT(pmv_light.id),0) AS completed FROM pmv_light WHERE status = 'validated'");
        $compRow = $getPmvComp->Row();
        $pmvComp = $compRow->completed;

        $getPmvReq = new MySQL();
        $getPmvReq->Query("SELECT IFNULL(SUM(pmv_sheet.pmv),0) AS required FROM pmv_sheet");
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