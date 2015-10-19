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


/* database settings */
define ('DB_HOST',  'localhost');
define ('DB_NAME',  'phipmvc');
define ('DB_USER',   NULL);
define ('DB_PASS',   NULL);

/* manually provided salt. should be changed for each application for security */
define ('SALT',  'NULL');

/* server settings */
define('DEFAULT_ADMIN_USERNAME',  'admin');
define('DEFAULT_ADMIN_PASSWORD',  NULL);
define('DEFAULT_ADMIN_EMAIL',  NULL);
define('DEFAULT_WEBSITE_URL', 'http://localhost/');
define('DEFAULT_HOSTNAME',  NULL);

/* sendgrid settings. this is used for sending emails to validate user on registration 
   sendgrid is an api offered by Microsoft Azure to send email through their cloud 
   hosting service.
*/

 define('USE_SENDGRID', TRUE);
 define('SENDGRID_USERNAME', NULL);
 define('SENDGRID_PASSWORD', NULL);
 define('SENDGRID_URL','https://api.sendgrid.com/');
 /* not needed as we are using the api */
 define('SENDGRID_SMTP_SERVER', NULL);

check_config_setup();

function check_config_setup() {
  if(! check_db_settings ()){     
    print 'Please enter your Database credentials in  config.php file in the Config folder<br>';
  }

  if(! check_salt()){
    print 'Please enter your manually created salt in config.php file in the Config folder<br>';
  }

  if(! check_server_settings ()){
    print 'Please enter your Server credentials in  config.php file in the Config folder<br>';
  }

  if(! check_sendgrid_settings ()){
    print 'Please enter your Sendgrid credentials in  config.php file in the Config folder.
    if you do not wish to use this service, set "USE SENDGRID" to FALSE<br>';
  }

}


function check_db_settings () {
   if(DB_USER == NULL ||DB_PASS == NULL){
      return FALSE;
   } else {
      return TRUE;
   }   
}

function check_salt () {
   if(SALT == NULL){
      return FALSE;
   } else {
      return TRUE;
   }   
}

function check_server_settings() {
  if(DEFAULT_ADMIN_PASSWORD == NULL ||DEFAULT_ADMIN_EMAIL == NULL ||DEFAULT_HOSTNAME == NULL){
     return FALSE;
  } else {
    return TRUE;    
  }
}

/* Check sendgrid settings. Using this API for sending emails to validate user on registration 
   sendgrid is an api offered by Microsoft Azure to send email through their cloud 
   hosting service.
*/

function check_sendgrid_settings() {
  if (USE_SENDGRID){
    if(SENDGRID_USERNAME == NULL || SENDGRID_PASSWORD == NULL) 
      return FALSE;
    }
  }else{
    return TRUE;
  }
}