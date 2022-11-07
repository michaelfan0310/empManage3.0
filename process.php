<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
 


  require_once 'AdminService.class.php';

  $usrid = $_POST["usrid"];
  $password = $_POST["psw"];   
  
  if( empty( $usrid ) || empty( $password) ){
           header("Location:login.php?error=2&user=$usrid&pswd=$password");
           exit();
  }
  
//   mysqli_query($conn, "set names utf8");
  

  
  $adminService= new AdminService();
  
  $name=$adminService->checkAdmin($usrid, $password);
  if($name!=""){
      header("Location: empManage.php?username=$name");
       exit();        
  }else{
      header("Location: login.php?error=1");
        exit();
  }

  

  
  
  ?>
 
