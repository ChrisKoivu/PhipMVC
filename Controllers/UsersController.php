

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



class UsersController extends Controller
{    
    private $_key, $_email;
    public function __construct($model, $action)
    {     
        parent::__construct($model, $action);            
        $this->_setModel(rtrim($model, 's'));
        $this->_view->set('show_email_textbox',TRUE);
        $this->_view->set('forgot_pw_header','Please enter your email address');
        
    }//end of constructor
     
    public function index()
    {
        $this->_view->set_header();
        $this->_view->set_footer();
        return $this->_view->render();   
    }   // end login method 
    
    public function login()
    {
            Session::clear_user_data( );
           $this->_view->set_header();
           $this->_view->set_footer(); 
           $this->_model->__initialize();      
            
        
       
            if (isset($_POST['submit']))
            {
               /* validated user */
               if($this->_model->valid_user($_POST['username'], $_POST['password'])){
                  /* clear post variables */
                  unset($_POST);
                   
                  /* user is logged in, so go to main page */
                 Session::redirect('/Home/index');             
               } else {
                 Session::redirect(DEFAULT_PAGE);    
               }            
            }     
            return $this->_view->render();   
    }   // end login method 
       
    public function forgot_password() {
        
        $this->_view->set_header();
        $this->_view->set_footer();
         if (isset($_POST['submit'])){
             $this->_model->forgot_password($_POST['email']);             
             $this->_view->set('forgot_pw_header','Please check your email for '
                     . 'password change link');            
             
         }
          
         return $this->_view->render();               
         
    }
   
    public function reset_password(){
         Session::clear_user_data( );
        if (isset($_POST['submit'])) {  
          $pw = Validate::validate_string($_POST['password']);
          $conf_pw  = Validate::validate_string($_POST['confirm_password']);
          unset($_POST);
          unset($_GET);   
          if($this->_model->verify_password_match($pw, $conf_pw)){
              $this->_model->create_new_password($pw);
              Session::redirect('/home/index');  
          }else{
              Session::redirect('/users/forgot_password');  
          }          
       }       
       $this->_view->render();       
    }
   
    public function change_password($url_query){    
       $this->_view->set_header();
       $this->_view->set_footer();
       $this->_view->set('error', 'this is an error');
       $valid_link = $this->_model->verify_link($url_query);          
       if(! $valid_link){
         Session::redirect('/users/forgot_password');  
       }
       $this->_view->render();       
    }           
    public function logout()
    {
      
        try {          
          Session::destroy();          
          Session::redirect('/users/index');    
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }//end logout method
} //end of user controller class
