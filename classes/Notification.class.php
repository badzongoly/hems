<?php
require_once('mysql.class.php');
/**
 * Created by PhpStorm.
 * User: Jude
 * Date: 1/11/2018
 * Time: 12:05 PM
 */

class Notification extends  MySQL{

    function sendSMS(){

    }

    function sendEmail($subject,$message,$recepientEmail){
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n".'From: no-reply@unicef.org'. "\r\n";

        $sub = $subject;
        $mess = "<html>
                                        <head>
                                         <title>".strtoupper($subject)."</title>
                                        </head>
                                        <body>
                                         <p>".strtoupper($subject)."</p>
                                         <p>$message</p>
                                        </body>
                                        </html>";

        $emailFeedback = mail($recepientEmail, $sub, $mess,$headers);

        if($emailFeedback){
            return 'ok';
        }else{
            return 'email_failed';
        }

    }

}
?>