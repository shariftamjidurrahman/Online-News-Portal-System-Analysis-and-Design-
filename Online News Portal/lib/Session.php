<?php 
   class Session{

       public static function init(){
           session_start();
       }
       public static function set($key,$value){
           $_SESSION[$key]=$value;
       }
       public static function get($key){
            if (!empty($_SESSION[$key])){
                return $_SESSION[$key];
            }else{
                return false;
            }
       }
       public static function checksession(){
           self::init();
            if (self::get("login")==false || self::get("role")=="subscriber"){
                self::destroy();
                header('Location:login.php');
            }
       }
       public static function destroy(){
           session_destroy();
           
       }
       
       
   }  
?>