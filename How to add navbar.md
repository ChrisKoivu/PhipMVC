# Adding a navbar to your View
  To add a navigation bar to your View, you need to enter
  the column and entries for the menu in array $key=>$value 
  format. The $key name is for the columns, and the $value
  is an array. The subarray, which is for the dropdown items
  has the item name as key, and the link for the value. The 
  link is actually the controller and action names, and not
  an actual url, forward slash seperated (ie: '/posts/index').


  
  *** Sample Code ***  
  
    
  
  
    $menu_array = array(      
     'home'=>array(       
                   'options'=>'active',                     
                   'link'=>'#',                      
                   'dropdown_items' => NULL                     
                   ),
      'page_1'=>array(
                   'options'=>'dropdown',
                   'link'=>'#',
                   'dropdown_items'=>array(
                       'Page_1-1'=>'#', <- the # is for url 
                       'Page_1-2'=>'#',
                       'Page_1-3'=>'#'
                     )
      ),
      'page_2'=>array(
                   'options'=>NULL,
                   'link'=>'#', 
                   'dropdown_items' => NULL
                    ),
      'page_3'=>array(
                   'options'=>NULL,
                   'link'=>'#', 
                   'dropdown_items' => NULL
                    )
    ); 
    self::insert_navbar($website_name, 'localhost', $menu_array);  
  
 
 