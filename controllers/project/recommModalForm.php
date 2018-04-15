<?php
require_once('../../classes/mysql.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 4/14/2018
 * Time: 11:53 AM
 */

    if(isset($_POST['cid']) && $_POST['do']=="closureTrxn"){

        $cid = base64_decode($_POST['cid']);

        $getRecomm = new MySQL();
        $getRecomm->Query("SELECT * FROM pmv_followup_actions WHERE id = $cid");
        $grow = $getRecomm->Row();

    }
?>

<form  method="POST" action="" id="closeThisRec">
    <table class="table table-responsive">
        <tr>
            <td class="col-lg-1"><strong>Finding:</strong></td>
            <td class="col-lg-4"><?php echo $grow->findings;?></td>
        </tr>
        <tr>
            <td><strong>Recommended Actions:</strong></td>
            <td><?php echo $grow->recomm_action;?></td>
        </tr>
        <tr>
            <td><strong>By Whom:</strong></td>
            <td><?php echo $grow->by_whom;?></td>
        </tr>
        <tr>
            <td><strong>By When:</strong></td>
            <td><?php echo $grow->by_when;?></td>
        </tr>
        <tr>
            <td><strong>Comments:</strong></td>
            <td><textarea style="width: 400px;" name="comments" id="comments"></textarea></td>
        </tr>
        <tr id="rsblk"><td colspan="2"><input type="submit" name="savecomm" id="savecomm" value="Close Recommendation" class="btn btn-primary btn-sm btn-block"></td></tr>
        <input type="hidden" value="<?php echo $grow->id;?>" name="recid">
    </table>
</form>
<script type="text/javascript">
    //close recommendation
    $(function () {

        var $buttons = $("#savecomm");
        var $form = $("#closeThisRec");

        $buttons.click(function (e) {

            e.preventDefault();
            $("#v_result").empty();


            $("#savecomm").attr("disabled", "disabled");
            $("#r_wait").css("display","block");

            $.ajax({
                type: "POST",
                url: "../../controllers/project/closeRecommendation.php",
                data: $form.serialize(),
                success: function(e) {

                    if(e=="fail"){

                        $('#v_result').html("<br><div align='center'><span class='alert alert-danger' style='text-align: center;'>Recommendation Failed To Close.</span></div><br>").hide().fadeIn(1000);
                        $("#r_wait").css("display","none");
                        $("#savecomm").removeAttr('disabled');

                    }else if(e=="ok"){

                        $('#v_result').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Recommendation Closed Successfully.</span></div><br>").hide().fadeIn(1000);
                        $("#r_wait").css("display","none");
                        $("#savecomm").removeAttr('disabled');
                        $("#rsblk").css("display","none");

                        var action = "fetchRlist";

                        $.ajax({
                            type: "POST",
                            url: "../../controllers/project/fetchRecommList.php",
                            data: {check: action},
                            success:function(r) {

                                $("#rlist").html(r);

                            }

                        });

                    }else{
                        $('#v_result').html("<br><div align='center'><span class='alert alert-success' style='text-align: center;'>Staff Sign off Saved Successfully.</span></div><br>").hide().fadeIn(1000);

                        $("#r_wait").css("display","none");
                        $("#savecomm").removeAttr('disabled');

                    }

                }
            });
            return false;

        });

    });
</script>