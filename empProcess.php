<?php
require_once 'EmpService.class.php';

$empService= new EmpService();


if(!empty($_REQUEST['flag'])){
    
    $flag=$_REQUEST['flag'];
    
    if($flag=="del"){
    
       $id=$_REQUEST['id'];
       
     
       
       
        if($empService->delEmpById($id)==1){           
        
               header("Location: ok.php");
               exit();
        }else{ 

                header("Location: error.php");
                exit();
            }
  }elseif ($flag=="addemp"){
       $id=$_POST['id'];
       $name=$_POST['name'];
       $email=$_POST['email'];
       $phone=$_POST['phone'];
       
       if(empty($id)||$id>1370){
         $res=$empService->addEmp($name, $email, $phone);
         if($res==1){
             
             header("Location: ok.php");
             exit();
            }else{
             
             header("Location: error.php");
             exit();
         }
       }
  }elseif ($flag=="updateemp"){
      $id=$_POST['id'];
      $name=$_POST['name'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      
      
          $res=$empService->updateEmp($id,$name, $email, $phone);
          if($res==1){
              
              header("Location: ok.php");
              exit();
          }else{
              
              header("Location: error.php");
              exit();
          }
      }
  
  

}




?>