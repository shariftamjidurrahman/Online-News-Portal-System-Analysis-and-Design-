<?php
class format{

     public function formatdate($date){
       return date('F j,Y,g:i a', strtotime($date));
     }
     
     public function textshorten($text,$limit){
       $text=$text." ";
       $text = substr($text,0,$limit);
        //$text = substr($text,0,strpos($text," "));
       $text=$text.".....";
       return $text;
     }
    
}
?>