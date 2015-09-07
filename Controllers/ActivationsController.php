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



class ActivationsController extends Controller
{    
    private $result;
    private $error;
    public function __construct($model, $action)
    {        
        parent::__construct($model, $action);            
        $this->_setModel(rtrim($model, 's')); 
        $this->_view->set('act_heading', 'Welcome to ' . DEFAULT_HOSTNAME);
        $this->_view->set('output', 'Thank you for validating your email address');
        $this->_view->set('button_link','/users/index');
        $this->_view->set('button_text','Login');
        $this->_view->set('glyph_name','glyphicon-log-in');
    }//end of constructor
     
    public function index()
    {
        $this->_view->set_header('splotch.header.php');
        $this->_view->set_footer('splotch.footer.php');
        return $this->_view->render();   
    }   // end index action

    public function confirm($url_query)
    {
        
        $this->_view->set_header('splotch.header.php');
        $this->_view->set_footer('splotch.footer.php');
             
        parse_str($url_query);
        $this->result = $this->_model->activate_user($email, $key);
        if(! $this->result){
          $this->_view->set('act_heading', 'ERROR !!');
          $this->_view->set('output', Error::get_error('activation'));
          $this->_view->set('button_link','/registrations/register');
          $this->_view->set('button_text','Register');
          $this->_view->set('glyph_name','glyphicon-user');
        }
        return $this->_view->render();   
    }   // end confirm action
   
  
    
} //end of user controller class

?>