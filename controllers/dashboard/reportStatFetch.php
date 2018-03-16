<?php
    require_once('../../classes/mysql.class.php');

    if(isset($_POST['section'])){

        $secid = $_POST['section'];
        $getPmvComp = new MySQL();
        $getPmvComp->Query("SELECT IFNULL(COUNT(id),0) AS completed FROM pmv WHERE section = $secid AND status = 'validated'");
        $compRow = $getPmvComp->Row();
        $pmvComp = $compRow->completed;

        $getPmvReq = new MySQL();
        $getPmvReq->Query("SELECT IFNULL(SUM(activities.pmv),0) AS required FROM activities
                            LEFT JOIN implementing_partners ON activities.partner_id = implementing_partners.ip_code
                            LEFT JOIN programmes_partners ON implementing_partners.id = programmes_partners.partner_id
                            WHERE programmes_partners.programme_id = $secid");
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