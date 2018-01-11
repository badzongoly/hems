<?php
require_once('mysql.class.php');
/**
 * User Authentication Class
 *
 * @version 1.0
 * @author Jude Gyimah
 */

class UserLogin extends MySQL{

    private $error = array();

    function __construct(){
        parent::__construct();
        if (!isset($_SESSION)) {
            session_start();
        }
    }
    /*
     * This function sanitizes authentication credentials
     * @param string data
     * @return Sanitized version of string input
     * */
    public function sanitize($data){

        return $this->SQLFix($data);

    }
    /*
      * This function checks from db if the user exists
      * @param username
      * @return true if exists, false if not
      * */
   public function user_exists($username){

       $uname = $this->sanitize($username);

       $this->Query("SELECT user_id FROM usr_users WHERE username = '$uname'");

       $count = $this->RowCount();

       return($count == 1) ? true : false;

    }
    /*
      * This function checks from db if the user is blacklisted
      * @param $username is the username
      * @return true if blacklisted, false if not
      * */
    public function blacklisted($username){

        $user = $this->sanitize($username);

        $this->Query("SELECT status FROM usr_users WHERE username = '$user'");
        $statRow = $this->Row();

        if($statRow->status == 'blacklisted'){
            return true;
        }

        if($statRow->status != 'blacklisted'){
            return false;
        }

    }
    /*
      * This function checks from db if the user account is active
      * @param $username is the username
      * @return true if active, false if not
      * */
    public function user_active($username){

        $user = $this->sanitize($username);

        $this->Query("SELECT user_id FROM usr_users WHERE username = '$user' AND status = 'active' ");

        $activeCount = $this->RowCount();

        return($activeCount == 1) ? true : false;

    }
    /*
      * This function gets userID of any user from the username
      * @param $username is the username
      * @return user ID
      * */
    public function user_id_from_username($username){
        $username = $this->sanitize($username);
        $this->Query("SELECT user_id FROM usr_users WHERE username = '$username'");
        $row = $this->Row();
        $id = $row->user_id;
        return $id;

    }
    /*
      * This function gets userID of any user by checking both username and password against the db
      * @param $username is the username
      * @param $password is the password entered by the user
      * @return user ID
      * */
    public function login($username, $password){

        $user_id = $this->user_id_from_username($username);
        $username = $this->sanitize($username);
        $password = sha1($password);

        $this->Query("SELECT user_id FROM usr_users WHERE username = '$username' AND password = '$password' ");

        $count = $this->RowCount();

        return($count==1) ? $user_id : false;

    }
    /*
      * This function builds and returns login error stored in the error global variable in the form of list items
      * @return error messsages
      * */
    public function  DisplayError(){

        $err = $this->error;

        $output = array();

        foreach($err as $oneerror){

            $output[] = '<li>'.'<strong>'.$oneerror.'</strong>'.'</li>';

        }

    return '<ul>'.implode('',$output).'</ul>';
}

    /*
      * This function stores login errors in the error global variable
      * @param error message triggered
      * */
    public function getError($message){

        $this->error[] = $message;

    }
}

?>