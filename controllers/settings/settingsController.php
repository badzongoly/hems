<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 13/01/2018
 * Time: 03:47 PM
 */
require_once('../../classes/settings.class.php');
$object = new Settings();
if(isset($_POST['do']) && $_POST['do'] == "CreateCountryOffice"){
    $check = $object->setCountryOffice($_POST['name'],$_POST['description'],$_POST['status']);
    if($check == "ok"){
        echo $object->getCountryOffices();exit;
    }else{
        echo "error";
    }
}
if(isset($_POST['do']) && $_POST['do'] == "CreateProgrammes"){
    $check = $object->setProgrammes($_POST['name'],$_POST['description'],$_POST['status']);
    if($check == "ok"){
        echo $object->getProgrammes();exit;
    }else{
        echo "error";
    }
}
if(isset($_POST['do']) && $_POST['do'] == "CreateOutcomes"){
    $check = $object->setOutcomes($_POST['name'],$_POST['description'],$_POST['status']);
    if($check == "ok"){
        echo $object->getOutcomes();exit;
    }else{
        echo "error";
    }
}if(isset($_POST['do']) && $_POST['do'] == "CreateOutput"){
    $check = $object->setOutput($_POST['name'],$_POST['description'],$_POST['outcome_id']);
    if($check == "ok"){
        echo $object->getOutput();exit;
    }else{
        echo "error";
    }
}
if(isset($_POST['do']) && $_POST['do'] == "CreateImplementingPartners"){
    $check = $object->setImplementingPartners($_POST['name'],$_POST['location'],$_POST['status'],$_POST['contact_person'],$_POST['phone'],$_POST['email']);
    if($check == "ok"){
        echo $object->getImplementingPartners();exit;
    }else{
        echo "error";
    }
}
if(isset($_POST['id']) && isset($_POST['act']) && $_POST['act'] == "delete" ){
    echo $object->deleteCountryOffice($_POST['id']);exit;
}
if(isset($_POST['id']) && isset($_POST['do_act']) && $_POST['do_act'] == "delete" ){
    echo $object->deleteProgrammes($_POST['id']);exit;
}
if(isset($_POST['id']) && isset($_POST['do_outcomes']) && $_POST['do_outcomes'] == "delete" ){
    echo $object->deleteProgrammes($_POST['id']);exit;
}if(isset($_POST['id']) && isset($_POST['do_action']) && $_POST['do_action'] == "delete" ){
    echo $object->deleteImplementingPartners($_POST['id']);exit;
}
if(isset($_POST['id']) && isset($_POST['do_something']) && $_POST['do_something'] == 'view assignment'){
    echo $object->viewAssignments($_POST['id']);
}
if(isset($_POST['id']) && isset($_POST['do_something']) && $_POST['do_something'] == 'fetch_form'){
    $id = $_POST['id'];
    $object->Query("Select id, name from programmes  WHERE status = 'Active'");
   ?>
    <div class="row">

        <div>
            <p align="center" style="display: none; color: limegreen;" id="wait"><img src="../../images/495.gif" > Adding programmes. Please wait....</p>
        </div>
        <div id="uc_response"></div>
    </div>
    <div class="row">
        <form id="createUserCatForm" method="post" action="">

            <table class="table table-responsive table-striped table-bordered" align="center">

                <thead>

                <tr>
                    <td colspan="5"><p id="confirmation" style="text-align:center"></p></td>
                </tr>

                </thead>
                <tbody>


                <tr>
                    <td><label>Select Programme:</label></td>
                    <td>
                        <select  id="programme_id" name="programme_id" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white">
                            <?php while (!$object->EndOfSeek()){
                                $row = $object->Row();
                             ?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                           <?php }?>
                        </select>
                    </td>

                </tr>
                <tr>
                    <td colspan="2"><input  type="submit" name="save" id="save" class="btn btn-primary" value="Save"></td>
                </tr>

                </tbody>

                <input type="hidden" name="partner_id" value="<?php echo $id; ?>"/>
                <input type="hidden" name="do" value="doAssignment"/>

            </table>
            <hr>
        </form>
    </div>
<?php
}
if(isset($_POST['do']) && $_POST['do'] == "doAssignment"){
    echo $object->makeAssignment($_POST['programme_id'],$_POST['partner_id']);exit;
}