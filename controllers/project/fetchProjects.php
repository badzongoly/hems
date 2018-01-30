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

if(isset($_POST['programme_id']) && isset($_POST['partner_id'])&& !empty($_POST['programme_id']) && !empty($_POST['partner_id'])){

    $progId = $_POST['programme_id'];
    $parterId = $_POST['partner_id'];

    $qury = "SELECT project.id, project.name AS proj_name, implementing_partners.name AS part_name, programmes.name AS prog_name,project.spot_check,project.pmv,
                           project.audit,project.start_date,project.duration,project.status
                           FROM project LEFT JOIN implementing_partners ON implementing_partners.id = project.partner_id
                           LEFT JOIN programmes ON  programmes.id = project.programme_id
                           WHERE project.programme_id = $progId AND project.partner_id = $parterId";

    $fetchProjects->Query($qury);
    $thecount = $fetchProjects->RowCount();

    if($thecount==false){
        echo "zero";exit;
    }

}


?>

<table id="data-table" class="table table-striped table-hover table-email table-bordered">
    <thead>
    <?php echo $pmvObj->fetchProjectListTitle($parterId,$progId);?>
    <tr>
        <th>Name</th>
        <th>PMV(s)</th>
        <th>Spot Check(s)</th>
        <th>Audit(s)</th>
        <th>Start Date</th>
        <th>duration</th>
        <th>Status</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php while(!$fetchProjects->EndOfSeek()){ $ucrow = $fetchProjects->Row();?>
        <tr>
            <td><?php echo $ucrow->proj_name;?></td>
            <td><a href="#loadPMV"><span class="badge badge-success"><?php echo $ucrow->pmv.' ('.$pmvObj->countAddedPMVs($ucrow->id).')';?></span></a></td>
            <td><?php echo $ucrow->spot_check;?></td>
            <td><?php echo $ucrow->audit;?></td>
            <td><?php echo $ucrow->start_date;?></td>
            <td><?php echo $ucrow->duration." Months";?></td>
            <td><?php echo $ucrow->status;?></td>
            <td><div class="btn-group m-r-5 m-b-5">
                <a href="javascript:;" data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle"><i class="fa fa-file-pdf-o"></i> Field Reports <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php if($pmvObj->checkPMVAdded($progId)=='open'){?><li><a href="add_pmv.php?pid=<?php echo base64_encode($ucrow->id);?>">Add PMV</a></li><?php } ?>
                    <li><a href="javascript:;">Add Spot Check</a></li>
                    <li><a href="javascript:;">Add Audit</a></li>
                </ul>
                </div></td>
        </tr>
    <?php } ?>

    </tbody>
</table>
<script>
    $(document).ready(function() {

        TableManageDefault.init();

    });
</script>