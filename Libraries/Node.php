<?php 

    class Node{
       private static $field_data_array = array();
     
     
       // node constructor
       public static function  __construct($this_array = NULL){ 
          if (! empty(self::$field_data_array) {
            self::$field_data_array[] = $this_array; 
          }else{
            self::$field_data_array = $this_array; 
          }
       }
 
       // returns data
       public static function getData($field){		
	     return self::$field_data_array[$field];        
       }
	 
       //standard Java-like toString function
       public static function __toString() {
         print_r($field_data_array);
       }
 
    }

?>