<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 05/01/2018
 * Time: 09:29 AM
 */
require_once('../../classes/user.management.class.php');
require_once('../../classes/notifications.class.php');
$notice =  new Notifications();
$object  = new User();
if(isset($_POST['do']) && $_POST['do']=="createUser") {
    $check  = $object->addUser($_POST['first_name'],$_POST['last_name'],$_POST['phone'],$_POST['email'],$_POST['status'],$_POST['user_cat']);
    if($check == 'ok'){
        $email = $_POST['email'];
        $pathInfo = $_SERVER['HTTP_HOST'].'/hems/setPassword.php';
        $message ='Hello, an account has been created on the UNICEF HEMS application with your email address and other credentials.<br/> Please your user name is '.$email.' follow this link <a href="'.$pathInfo.'?id='.base64_encode($email).'">HERE</a> to set a password and login in.';
        $subject = 'New Account Creation';
        $notice->sendEmail($_POST['email'],$message,$subject);
        echo "ok";exit;
    }else{
        echo $check;exit;
    }
}if(isset($_POST['do']) && $_POST['do']=="editUser") {
    echo $object->editUser($_POST['first_name'],$_POST['last_name'],$_POST['phone'],$_POST['email'],$_POST['status'],$_POST['user_cat'],$_POST['id']);exit;
}
if(!empty($_POST['eid'])) {
    echo $object->getStaffEmail($_POST['eid']);exit;
}
if(isset($_POST['usercat']) && isset($_POST['do']) && $_POST['do']=="Userlist"){
    echo $object->findUser($_POST['usercat']);exit;
}
if(isset($_POST['do']) && $_POST['do']=="updateUser" && isset($_POST['uid'])){
    echo $object->updateUser($_POST['user_cat'],$_POST['username'],$_POST['user_status'],$_POST['uid']);exit;
}
if(isset($_POST['do']) && $_POST['do']=="CreateUserCat" && isset($_POST['cat_name'])){

    echo $object->addUserCat( $_POST['cat_name'],$_POST['status']);exit;
}
if(isset($_POST['category_id']) && !empty($_POST['category_id']) && !isset($_POST['do'])){
    echo $object->fetchCatPrivs($_POST['category_id']);exit;
}
if(isset($_POST['do']) && $_POST['do']=="assignPrivs" && isset($_POST['user_cat']) ){
    if(isset($_POST['priv_check'])) {
        echo $object->saveAssignedLinks($_POST['user_cat'], $_POST['priv_check']);
        exit;
    }else{
        echo "unchecked";exit;
    }

}
if(isset($_POST['id']) && isset($_POST['act']) && $_POST['act'] == "delete" ){
    echo $object->deleteUserCat($_POST['id']);exit;
}
if(isset($_POST['do']) && $_POST['do']=="set_password" ){
    if($_POST['password'] == $_POST['confpassword']) {
        echo $object->setPassword($_POST['username'], $_POST['password']);
        exit;
    }else{
        echo "mismatch";exit;
    }
}
