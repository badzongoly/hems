<?php
require_once('../../classes/Password.php');
require_once('../../classes/Notification.class.php');
require_once('../../classes/Authentication.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 1/12/2018
 * Time: 9:37 AM
 * Controller for handling forgot password requests from users
 */

$auth = new Authentication();
$password = new Password();
$sendMail = new Notification();

if(isset($_POST['email']))
{
    if(!empty($_POST['email']))
    {

        $username = trim($_POST['email']);
        $userFullname = $auth->getUserFullname($username);

        if(trim($userFullname)=='invalid_email'){
            echo 'unknown_email';exit;
        }

        //Generate new password and encrypt
        $newPassword = $password->generatePassword();
        $encrytedPassword = sha1($newPassword);

        $emailSubject = "H.E.M.S Password Reset";
        //Build email message
        $buildEmailMessage = "Hello <strong>$userFullname</strong>,<br/>
                                         You forgot your password to your H.E.M.S account
                                         and requested for a new password.<br><br>

                                         Your new password is <strong>$newPassword</strong>";

        //Update password
        $updateResponse = $auth->passwordResetAccountUpdate($username,$encrytedPassword);


        if($updateResponse == 'update_success'){

            //Format and send email
            $mess = wordwrap($buildEmailMessage, 50);
            $fdbk = $sendMail->sendEmail($emailSubject,$mess,$username);

            if($fdbk=='ok'){
                echo "success";exit;
            }else{
                echo "failed";exit;
            }


        }else{

            return "failed";

        }

    }

}


?>