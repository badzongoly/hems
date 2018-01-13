<?php
    require_once('../../classes/mysql.class.php');
    require_once('../../classes/Password.php');
    require_once('../../classes/Notification.class.php');
    require_once('../../classes/Authentication.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 1/12/2018
 * Time: 12:23 PM
 * This controller processes the password change request from a logged in user
 */

session_start();
$update = new MySQL();
$auth = new Authentication();
$sendMail = new Notification();

if(isset($_POST['current']) && isset($_POST['newpass']) && isset($_POST['confpass'])&& isset($_SESSION['hems_User']['user_id'])) {

    $current = sha1(trim($_POST['current']));
    $new = trim($_POST['newpass']);
    $conf = trim($_POST['confpass']);
    $up_id = $_SESSION['hems_User']['user_id'];

    $username = trim($_SESSION['hems_User']['username']);
    $userEmail = trim($_SESSION['hems_User']['email']);

    if($new == $conf){
        //if the new password is the same as the confirmation
        $check = new MySQL();
        $check->Query("SELECT * FROM usr_users WHERE user_id = $up_id");
        $recordset = $check->Row();
        $dbpass = $recordset->password;

        if($current == $dbpass){

            $validate = new Password(array(
                'minLength'      => 6,
                'maxLength'      => 30,
                'minNumbers'     => 1,
                'minLetters'     => 4,
                'minLowerCase'   => 0,
                'minUpperCase'   => 0,
                'minSymbols'     => 1,
                'maxSymbols'     => 30,
                'allowedSymbols' => array('@','#','$','%','&','^','*','?','!'),
            ));

            $validate->validatePassword($new);

            $err = $validate->getErrors();

            if(!empty($err)){

                $output = array();

                foreach($err as $oneerror){

                    $output[] = '<li>'.'<strong>'.$oneerror.'</strong>'.'</li>';

                }

                echo '<ul class="alert alert-danger">'.implode('',$output).'</ul>';exit;

            }
            if(empty($err)){

                $valuesArray['password'] = MySQL::SQLValue(sha1($new));
                $whereArray['user_id'] = $up_id;
                $tableName = 'usr_users';

                $sql = MySQL::BuildSQLUpdate($tableName, $valuesArray,$whereArray);
                $qresult = $update->Query($sql);

                if ($qresult) {

                    $userFullname = $auth->getUserFullname($username);

                    $emailSubject = "H.E.M.S Change Password";
                    //Build email message
                    $buildEmailMessage = "Dear <strong>$userFullname</strong>,<br/>
                                         Your password has been successfully changed.<br><br>

                                         Your new password is <strong>$new</strong>";

                    //Format and send email
                    $mess = wordwrap($buildEmailMessage, 50);
                    $sendMail->sendEmail($emailSubject,$mess,$userEmail);

                    echo "ok";exit;

                } else {

                    echo "fail";exit;

                }

            }

        }else{

            echo "db_check_error";exit;

        }

    }

}