<?php

  function recordVisiting(){
    
    date_default_timezone_set("America/Toronto");
    
    if(!empty($_COOKIE['lastVisit'])){
        echo  "<p style='margin-left:40%'>Your last visit time is  &nbsp;  ".$_COOKIE['lastVisit']." </p>";
        setcookie("lastVisit",date("Y-m-d H:i:s"), time()+24*3600*30);
        
    }else{
        echo "Welcome!! This is your first time visiting here";
        setcookie("lastVisit",date("Y-m-d H:i:s"), time()+24*3600*30);
    }
    
  }
    
   function getCookieVal($key){
        if(!empty($_COOKIE[$key])){
            return $_COOKIE[$key];
        }else{
            return "";
        }

    }
    
    function checkUserValidate(){
        
        session_start();
        if(empty($_SESSION['loginUser'])){
            header("Location:login.php?errno=1");
            exit();
        }
        
    }
    
    
?>