<!DOCTYPE html>
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
 
     
       include($this->header);   
       /* this part is needed if you dont want unauthorized users on
        * this page  */   
       
     ?>  
     
      <!-- Page content  -->
      <!-- ?php echo dirname(__FILE__); Shows directory where file is located ?-->
        <div class="panel panel-default">
      <div class="panel-heading"> <h4>Posts </h4></div>
   	<div class="panel-body">
            <ul class="list-group">
              <?php //$this->get($posts); ?> 
            </ul>
         </div>
       </div>

         <div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Feeds</h4></div>
   			<div class="panel-body">
              <ul class="list-group">
              <li class="list-group-item">Bootply Playground</li>
              <li class="list-group-item">Bootstrap Editor</li>
              <li class="list-group-item">Bootstrap Templates</li>
              </ul>
            </div>
   	</div>
             <div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>New on YouTube!</h4></div>
   			<div class="panel-body">
              <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
              <div class="clearfix"></div>
              <hr>
              
              <p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>
              
              <hr>
              <form>
              <div class="input-group">
                <div class="input-group-btn">
                <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
                </div>
                <input type="text" class="form-control" placeholder="Add a comment..">
              </div>
          	  </form>
              
          
         </div>
 
        
        <!-- End of page content -->    
            
        <?php 
        
        
        include($this->footer); ?>  
       