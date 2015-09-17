<?php 

    class Node{
       private static $data;
     
     
       // node constructor
       public static function  __construct($array_data = NULL){ 
          $this->data = $array_data;          
       }
 
       // returns data
       public static function getData($key){		
	 return $this->data[$key];        
       }
	 
       //standard Java-like toString function
       public static function __toString() {
         print_r($data);
       }
 
    }

?>