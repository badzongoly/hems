<?php
require_once('mysql.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 1/12/2018
 * Time: 9:43 AM
 */

class Authentication extends MySQL {

    /*
     * Gets the user's fullname from the database
     * @param $loginUsername is the user's login username
     * @return fullname string
     * */
    function getUserFullname($loginUsername){

        $uname = trim($loginUsername);
        $this->Query("SELECT * FROM usr_users WHERE username = '$uname'");
        $result = $this->RowCount();
        if($result > 0){

            $recieverRow = $this->Row();
            $userFullname = $recieverRow->first_name.' '.$recieverRow->last_name;
            return $userFullname;

        }else{

            return "invalid_email";

        }


    }

    /*
     * Gets the user's fullname from the database
     * @param $loginUsername is the user's login username
     * @return fullname string
     * */
    function passwordResetAccountUpdate($username,$encryptedPassword){

        $uname = trim($username);
        $result  = $this->Query("UPDATE `usr_users` SET `password` = '$encryptedPassword'  WHERE `username` = '$uname'");

        if($result){

            return 'update_success';

        }else{

            return "update_fail";

        }


    }



} 