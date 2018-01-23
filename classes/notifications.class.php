<?php

/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 12/01/2018
 * Time: 06:04 AM
 */
class Notifications
{

    public function sendEmail($userlogin, $msg,$subject){

        $uname = trim($userlogin);

$headers_info = "From:noreply@hems.com \r\n";
$headers_info .= "Reply-To: noreply@hems.com \r\n";
$headers_info .= "MIME-Version: 1.0\r\n";
$headers_info .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$finalmsg = '<table border="0" cellpadding="0" cellspacing="0" class="m_-3102898062330353652m_-995036018969291408m_4510909339846657150body" style="border-collapse:separate;background-color:#f6f6f6;width:100%">
      <tbody><tr>
        <td style="font-size:14px;vertical-align:top">&nbsp;</td>
        <td class="m_-3102898062330353652m_-995036018969291408m_4510909339846657150container" style="font-size:14px;vertical-align:top;display:block;max-width:580px;padding:10px;width:580px;Margin:0 auto!important">
          <div class="m_-3102898062330353652m_-995036018969291408m_4510909339846657150content" style="box-sizing:border-box;display:block;Margin:0 auto;max-width:580px;padding:10px">
            
            <span class="m_-3102898062330353652m_-995036018969291408m_4510909339846657150preheader" style="color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;width:0">This is preheader text. Some clients will show this text as a preview.</span>
           
            <table class="m_-3102898062330353652m_-995036018969291408m_4510909339846657150main" style="border-collapse:separate;width:100%;background-image:url(\'https://ci4.googleusercontent.com/proxy/ExF0qbQSGNi2PePbfRlgw0f3cyk2c8pqLEQbJkEWvRc6CW0fgtspJopAiEUrK_ERgFe2bjAqLcX0vCrGIonbx56iLVX_u9p8gQNTi0ohNq2Mznsr=s0-d-e1-ft#https://designs.hubtel.com/resources/img/add-ons/bg-shadow.png\');background-size:100% 99%;background-repeat:no-repeat;width:100%!important;padding-bottom:20px">
              
             
              <tbody><tr>
                  <td style="padding:0">
                      <img src="" alt="HEMS" style="padding-left:6.5px;padding-right:6.5px;width:600px;height:70px;" class="CToWUd">
                  </td>
              </tr>
              <tr>
                <td class="m_-3102898062330353652m_-995036018969291408m_4510909339846657150wrapper" style="font-size:14px;vertical-align:top;box-sizing:border-box;padding:20px">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;width:100%">
                    <tbody><tr>
                      <td style="font-family:\'Assistant\',Helvetica,Arial,sans-serif;font-size:13px;vertical-align:top;padding:10px;">
                       <p style="Margin:0;font-size:14px;Margin-bottom:10px;color:#716f6f;text-align:justify">';
$finalmsg.=$msg;
$finalmsg.='</p>  <p style="Margin:0;font-size:14px;Margin-bottom:10px;color:#716f6f"></p>
                                    
                                 
                                     <p style="Margin:0;font-size:14px;Margin-bottom:10px;Margin-top:20px;color:#716f6f">Thank You,<br>
                                    ';

$finalmsg.='
                                    <br/>
										UNICEF <br>
										</p>
                      
                       
                         <table border="0" cellpadding="0" cellspacing="0" class="m_-3102898062330353652m_-995036018969291408m_4510909339846657150btn m_-3102898062330353652m_-995036018969291408m_4510909339846657150btn-primary" style="border-collapse:separate;box-sizing:border-box;width:100%">
                          <tbody>
                            <tr>
                              <td align="left" style="font-size:14px;vertical-align:top;padding-bottom:15px">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;width:100%;margin-top:20px">
                                  <tbody>
                                    <tr>
                                      <td style="border-right:solid 1px #dddddd"> 
                                          <a href="https://www.site.gtuc.edu.gh" target="_blank" data-saferedirecturl="http://tech-baza.com/wp-content/uploads/2017/03/tech-baza.png"><img src="" alt="HEMS" style="width:50px;" class="CToWUd"></a> 
                                      </td>
                                      <td>
                                         
                                          <table style="width:100%">
                                              <tbody><tr>
                                                  <td colspan="2"> <p style="padding-top:0;padding-bottom:0;padding-left:10px;padding-right:0;margin:0;font-size:12px;color:#818181">For further questions or concerns, contact us via any of the channels.</p></td>
                                              </tr>
                                              <tr>
                                                  <td style="border-right:solid 1px #dddddd;padding-left:10px;width:55%;vertical-align:top">
                                                      <p style="color:#f8971d;font-weight:300;margin:0;font-size:12px">UNICEF ACCRA GHANA</p>
                                                      <p style="margin:0;font-size:12px;color:#818181">
                                                          Tel.+233  
                                                      </p>
                                                      <p style="margin:0;font-size:12px;color:#818181">Mobile: <a href="tel:024%20243%208050" value="+233242438050" target="_blank">+233 , +233 .</a></p>
                                                  </td>
                                                  <td style="padding-left:10px;width:45%;vertical-align:top">
                                                      <p style="margin:0;font-size:12px;color:#818181">Email: <a href="info@site.gtuc.edu.gh" style="color:#f8971d" target="_blank">info@site.unicef.com</a></p>
                                                      <p style="margin:0;font-size:12px;color:#818181"><a href="https://site.gtuc.edu.gh" style="color:#f8971d" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://unicef.com&amp;source=gmail&amp;ust=1495141417388000&amp;usg=AFQjCNG3O_ifMDFsKIexNeZv40x38CT4Qw">unicef.com</a></p>
                                                 </td>
                                              </tr>
                                          </tbody></table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            
                          </tbody>
                        </table>
                        
                      </td>
                    </tr>
                  </tbody></table>
                </td>
              </tr>
              
            </tbody></table>
          
            
            <div class="m_-3102898062330353652m_-995036018969291408m_4510909339846657150footer" style="clear:both;padding-top:10px;text-align:center;width:100%">
              <span class="HOEnZb"><font color="#888888">
                </font></span><span class="HOEnZb"><font color="#888888">
              
              </font></span><table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;width:100%">
                <tbody><tr>
                  <td class="m_-3102898062330353652m_-995036018969291408m_4510909339846657150content-block" style="font-family:\'Assistant\',Helvetica,Arial,sans-serif;font-size:14px;vertical-align:top;color:#999999;font-size:12px;text-align:center">
                   
                    <br>
                    <ul style="display:inline">
                        <li style="display:inline;margin-right:10px">
                            <a href="https://www.facebook.com/gtuconline " target="_blank"><img src="https://ci4.googleusercontent.com/proxy/oO98k61gIgSTJU_EhLIx-_9p5cMWvaeEHW1c8NSvyA6x1dzDQ86P5CwJdV_GjrnT3sF0C5pB1_JtOElsVNOloanvOkqyvaxcugxGUBZ4_BsV6onVwSZKUAUJuyfo=s0-d-e1-ft#https://designs.hubtel.com/resources/img/social-media/facebook-grey.png" class="CToWUd"></a>
                        </li>
                          <li style="display:inline">
                            <a href="https://twitter.com/gtuconline" target="_blank" ><img src="https://ci4.googleusercontent.com/proxy/DzfraCaEN3YWpYVZM95NmrQANk-4nLnoDbK7LOEAHdBcW4XGivPJLgCmcZ2xVD0JhOxfqDGfBzVE6NjIK88TiKS3vgkdHUTa4-Whr-7Ai6VgSUP1VCOIpHUuW-U=s0-d-e1-ft#https://designs.hubtel.com/resources/img/social-media/twitter-grey.png" class="CToWUd"></a>
                        </li>
                          <!--<li style="display:inline;margin-left:10px">
                            <a href="https://www.instagram.com/hubtelsolutions/" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://www.instagram.com/hubtelsolutions/&amp;source=gmail&amp;ust=1495141417388000&amp;usg=AFQjCNH1mXKA1Ujvs5fyY-aDuJ90Pgu4Vg"><img src="https://ci4.googleusercontent.com/proxy/6j7wvOSR4S66FHWah5gKFoATiwVWO0ST-eJu34AO4m1-mV-F4OzaUAgI6Eu4qi5JogQHhMBxVnGWc_B80C7X65MWmfu77NUELn2mQYEcAx-qAx5B2bgr4lyEf3VSDA=s0-d-e1-ft#https://designs.hubtel.com/resources/img/social-media/instagram-grey.png" class="CToWUd"></a><span class="HOEnZb"><font color="#888888">
                        </font></span></li>
						-->
						<span class="HOEnZb"><font color="#888888">
                    </font></span></ul><span class="HOEnZb"><font color="#888888">
                    
                  </font></span></td></tr></tbody></table><span class="HOEnZb"><font color="#888888">
            </font></span></div><span class="HOEnZb"><font color="#888888">
            
            
          </font></span></div><span class="HOEnZb"><font color="#888888">
        </font></span></td>
        <td style="font-size:14px;vertical-align:top">&nbsp;</td>
      </tr></tbody></table>';
$check = mail($uname, $subject, $finalmsg, $headers_info);
return $check;
}
}