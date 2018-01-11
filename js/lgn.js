/**
 * Created by Jude on 1/11/2018.
 */
$(function () {

    var $btns = $("#loginMeIn");
    $btns.click(function (e) {

        e.preventDefault();
        $("#unerror").empty();
        $("#perror").empty();
        $("#ack").empty();

        var uname = $.trim($("#username").val());
        var pss = $.trim($("#password").val());

        if(uname.length == 0){

            $("#unerror").html('<p><small style="color:red;">Enter Username.</small><p/>');

        }
        if(pss.length == 0){

            $("#perror").html('<p><small style="color:red;">Enter Password.</small><p/>');

        }

        if(uname.length != 0 && pss.length != 0){

            $("#lgwait").css("display","block");
            $("#loginMeIn").attr("disabled","disabled");

        $.ajax({
            type: "POST",
            url: "controllers/auth/login.php",
            data: $('#loginForm').serialize(),
            success:function(msg) {

                if(msg==="ok"){
                    window.location.replace("views/dashboard/dashboard.php");
                }else{
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
