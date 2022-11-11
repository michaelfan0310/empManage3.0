<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
 


  require_once 'AdminService.class.php';

  $usrid = $_POST["usrid"];
  $password = $_POST["psw"]; 
  
//   $checked= $_POST['check'];
 
  
  if(empty( $_POST['check'])){
      if(!empty($_COOKIE['usrid'])){
      setcookie("usrid",$usrid, time()-100);//删除cookie
      }
   }else{
      
          setcookie("usrid",$usrid, time()+24*3600*30);
   } 
  
  
  if( empty( $usrid ) || empty( $password) ){
           header("Location:login.php?errno=2&user=$usrid&pswd=$password");
           exit();
  }
  
//   mysqli_query($conn, "set names utf8");
  

  
  $adminService= new AdminService();
  
  $name=$adminService->checkAdmin($usrid, $password);
  if($name != ""){
      header("Location: empManage.php?username=$name");
       exit();        
  }else{
      header("Location: login.php?errno=1");
        exit();
  }

  

  
  
  ?>
 
