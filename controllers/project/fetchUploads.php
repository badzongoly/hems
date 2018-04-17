<?php
require_once('../../classes/mysql.class.php');
require_once('../../classes/Pmv.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 1/15/2018
 * Time: 2:03 PM
 */
$fetchProjects =  new MySQL();
$pmvObj =  new Pmv();

if(isset($_POST['vendor']) && isset($_POST['outcome'])){

    $vend = $_POST['vendor'];
    $outcome = $_POST['outcome'];
    $year = trim($_POST['year']);

    $qury = "SELECT pmv_sheet.id,outcomes.name AS oname, implementing_partners.name AS iname,implementing_partners.ip_code,pmv_sheet.date,pmv_sheet.pmv
            FROM pmv_sheet
            LEFT JOIN implementing_partners ON pmv_sheet.vendor = implementing_partners.ip_code
            LEFT JOIN outcomes ON pmv_sheet.outcome_area = outcomes.code
            WHERE vendor =  '$vend' AND outcome_area = $outcome AND date LIKE '%$year'";

    $fetchProjects->Query($qury);
    $thecount = $fetchProjects->RowCount();

    if($thecount==false){
        echo "zero";exit;
    }

}


?>

<table id="data-table" class="table table-striped table-hover table-email table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Partner Name</th>
        <th>Partner Code</th>
        <th>Outcome Area</th>
        <th>Required PMVs</th>
        <th>Submitted PMVs</th>
        <th>Date</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $ucount = 1; while(!$fetchProjects->EndOfSeek()){ $ucrow = $fetchProjects->Row();?>
        <tr>
            <td><?php echo $ucount;?></td>
            <td><?php echo $ucrow->iname;?></td>
            <td><?php echo $ucrow->ip_code;?></td>
            <td><?php echo $ucrow->oname;?></td>
            <td style="text-align: center"><?php echo $ucrow->pmv;?></td>
            <td style="text-align: center"><?php echo $pmvObj->countAddedPMVs($ucrow->id);?></td>
            <td><?php echo $ucrow->date;?></td>
            <td><div class="btn-group m-r-5 m-b-5">
                    <?php if($pmvObj->checkPMVAdded($ucrow->id)=='open'){?>
                <a href="javascript:;" data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle"><i class="fa fa-file-pdf-o"></i> Field Reports <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="add_pmv_light.php?shid=<?php echo base64_encode($ucrow->id);?>">Add PMV</a></li>
                </ul>
                </div>
                <?php } ?></td>
        </tr>
    <?php $ucount++; } ?>

    </tbody>
</table>
<script>
    $(document).ready(function() {

        TableManageDefault.init();

    });
</script>