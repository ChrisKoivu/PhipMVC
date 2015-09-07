<?php
/* ///////////////////////////////////////////////////////////////////////////////////////////////////////////
Copyright (c) June 28, 2015. Christopher M Koivu.


Permission is hereby granted, free of charge, to any person obtaining a copy of 
this software and associated documentation files (the "Software"), the rights to 
use, copy, modify, merge, publish, or distribute copies of the Software, and to 
permit persons to whom the Software is furnished to do so, subject to the 
following conditions:

The above copyright notice and this permission notice shall be included in all 
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 
PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT 
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION 
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE 
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
////////////////////////////////////////////////////////////////////////////////////////////////////////// */
 


/* this class uses Microsoft Azure's Sendgrid service
 * this service is convenient as it doesnt require alot
 * of configuration, and since i have an Azure account,
 * the service is free for 25,000 emails. The configuration
 * settings are entered in the config.php file in the Config
 * folder.
 */

Class Email {
private static $params;
private static $response;


Public static function init($email_recipient, $email_subject, $email_body){
  self::$params = array(
      'api_user' => SENDGRID_USERNAME,
      'api_key' => SENDGRID_PASSWORD,
      'to' => $email_recipient,
      'subject' => $email_subject,
      'html' => $email_body,
      'text' => $email_body,
      'from' => DEFAULT_ADMIN_EMAIL
  );
}

public static function send_mail(){
  $request = SENDGRID_URL .'api/mail.send.json';
  // set curl request
  $session = curl_init($request); 
  curl_setopt ($session, CURLOPT_POST, true);
  // set body of the POST
  curl_setopt ($session, CURLOPT_POSTFIELDS, self::$params);
 // do not return headers, but return response
  curl_setopt($session, CURLOPT_HEADER, false);
  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
 // get response
  self::$response = curl_exec($session);
  curl_close($session); 
}

public static function print_response(){     
  print_r(self::$response);
}

}

?>