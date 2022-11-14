<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
 
  

  require_once 'AdminService.class.php';
  
//   if(isset($_GET['PHPSESSID'])){
//       session_id();
//   }
//   $sid=session_id();

  $usrid = $_POST["usrid"];
  $password = $_POST["psw"]; 
  

 
  
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
  
  
  $checkCode=$_POST['checkCode'];
  
  session_start();
  
  if($checkCode != $_SESSION['myCheckCode']){
      header("Location: login.php?errno=3");
      exit();
  }  
  
  if($name != ""){
     
      $_SESSION['loginUser']=$name;//如果cookie被禁用??
      header("Location: empManage.php?username=$name");
       exit();        
     }else{
      header("Location: login.php?errno=1");
        exit();
     }

     ?>
