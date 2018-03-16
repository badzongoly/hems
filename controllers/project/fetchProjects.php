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

if(isset($_POST['partner_id']) && !empty($_POST['partner_id'])){

    $parterId = $_POST['partner_id'];

<<<<<<< HEAD
    $qury = "SELECT a.id, a.name AS proj_name, implementing_partners.name AS part_name, programmes.name AS prog_name,a.spot_check,a.pmv,
                           a.audit,a.start_date,a.duration,a.status
                           FROM activities a LEFT JOIN implementing_partners ON implementing_partners.ip_code = a.partner_id
              
                           WHERE a.partner_id = $parterId";
=======
    $qury = "SELECT activities.id, activities.partner_id, implementing_partners.name AS part_name,activities.spot_check,activities.pmv,
                           activities.audit,activities.status
                           FROM activities LEFT JOIN implementing_partners ON implementing_partners.ip_code = activities.partner_id
                           WHERE activities.partner_id = '$parterId'";
>>>>>>> 5ac85658c825f9d069a1fe2af36b3eb5bbed749f

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
        <th>I.P Name</th>
        <th>PMV(s)</th>
        <th>Spot Check(s)</th>
        <th>Audit(s)</th>
        <th>Status</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php while(!$fetchProjects->EndOfSeek()){ $ucrow = $fetchProjects->Row();?>
        <tr>
            <td><?php echo $ucrow->part_name;?></td>
            <td><a href="#loadPMV"><span class="badge badge-success"><?php echo $ucrow->pmv.' ('.$pmvObj->countAddedPMVs($ucrow->id).')';?></span></a></td>
            <td><?php echo $ucrow->spot_check;?></td>
            <td><?php echo $ucrow->audit;?></td>
            <td><?php echo $ucrow->status;?></td>
            <td><div class="btn-group m-r-5 m-b-5">
                <a href="javascript:;" data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle"><i class="fa fa-file-pdf-o"></i> Field Reports <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php if($pmvObj->checkPMVAdded($ucrow->id)=='open'){?><li><a href="add_pmv.php?pid=<?php echo base64_encode($ucrow->id);?>">Add PMV</a></li><?php } ?>
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