<?php

/* ///////////////////////////////////////////////////////////////////////////////////////////////////////////
Copyright (c) June 28, 2015. Christopher M Koivu.


Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, or distribute copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED 
TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL 
THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF 
CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
////////////////////////////////////////////////////////////////////////////////////////////////////////// */


// this file handles our mvc routing
define ('DS', DIRECTORY_SEPARATOR);
define ('HOME', dirname(__FILE__));
define('DEFAULT_PAGE','/Users/index');
 
ini_set ('display_errors', 1);
 
// define our database configurations. this file is loaded when page is accessed
require_once HOME . DS . 'Config'. DS . 'Config.php';

// this file handles the mvc requests as they come in
require_once HOME . DS . 'Libraries' . DS . 'Core.php';
 
function __autoload($class)
{
    if (file_exists(HOME . DS . 'Libraries' . DS . $class . '.php'))
    {
        require_once HOME . DS . 'Libraries' . DS . $class . '.php';
    }
    else if (file_exists(HOME . DS . 'Models' . DS . $class . '.php'))
    {
        require_once HOME . DS . 'Models' . DS . $class  . '.php';
    }
    else if (file_exists(HOME . DS . 'Controllers' . DS . $class . '.php'))
    {
        require_once HOME . DS . 'Controllers' . DS . $class . '.php';
    }
    else if (file_exists(HOME . DS . 'Views' . DS . 'Layout' . DS . $class . '.php'))
    {
        require_once HOME . DS . 'Views' . DS . 'Layout' . DS . $class . '.php';
    }
}

?>
