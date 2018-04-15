<?php
require_once('../../classes/mysql.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 4/14/2018
 * Time: 5:12 PM
 */

$fetchAllReccs = new MySQL();
$qury = "SELECT * FROM pmv_followup_actions WHERE proc_status = 'open'";

$fetchAllReccs->Query($qury);
?>

<table id="data-table" class="table table-striped table-hover table-email table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Findings</th>
        <th>Recommended Action</th>
        <th>By Whom</th>
        <th>By When</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $ucount = 1; while(!$fetchAllReccs->EndOfSeek()){ $ucrow = $fetchAllReccs->Row();?>
        <tr>
            <td><?php echo $ucount;?></td>
            <td><?php echo $ucrow->findings;?></td>
            <td><?php echo $ucrow->recomm_action;?></td>
            <td><?php echo $ucrow->by_whom;?></td>
            <td><?php echo $ucrow->by_when;?></td>
            <td><a href="#closureModal"  id="procClosure" data-toggle="modal" class="btn btn-primary btn-sm" name="<?php echo base64_encode($ucrow->id);?>">Process Closure</a></td>
        </tr>
        <?php $ucount++; } ?>

    </tbody>
</table>
<script>
    $(document).ready(function() {
        TableManageDefault.init();
        FormPlugins.init();
    });

</script>