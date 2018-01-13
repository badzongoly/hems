/**
 * Created by Jude on 1/11/2018.
 */
$(function () {

    var $btns = $("#loginMeIn");
    $btns.click(function (e) {

        e.preventDefault();
        $("#unerror").empty();
        $("#perror").empty();
        $("#cperror").empty();
        $("#ack").empty();

        var uname = $.trim($("#username").val());
        var pss = $.trim($("#password").val());
        var conf = $.trim($("#confpassword").val());

        if(uname.length == 0){

            $("#unerror").html('<p><small style="color:red;">Enter Username.</small><p/>');

        }
        else if(pss.length == 0){

            $("#perror").html('<p><small style="color:red;">Enter Password.</small><p/>');

        }
        else if(conf.length == 0){
            $("#cperror").html('<p><small style="color:red;">Confirm Password.</small><p/>');
        }
        else if(conf != pss)
        {
            $("#cperror").html('<p><small style="color:red;"> Password Does Not Match.</small><p/>');
            $('#confpassword').val('');
            $('#confpassword').focus();
        }

        else if(uname.length != 0 && pss.length != 0 && pss === conf){

            $("#lgwait").css("display","block");
            $("#loginMeIn").attr("disabled","disabled");

        $.ajax({
            type: "POST",
            url: "controllers/users/userController.php",
            data: $('#loginForm').serialize(),
            success:function(msg) {

                if(msg==="ok"){
                    window.location.replace("index.php");
                }
                else if(msg === "mismatch"){
                    $("#ack").html("Password mismatch with confirmation password");
                    $("#lgwait").css("display","none");
                    $("#loginMeIn").removeAttr("disabled");
                }
                else{
                    $("#ack").html(msg);
                    $("#lgwait").css("display","none");
                    $("#loginMeIn").removeAttr("disabled");
                }
            }
        });

        return false;

        }

    });

});
