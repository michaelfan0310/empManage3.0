<?php
require_once 'EmpService.class.php';

$empService= new EmpService();


if(!empty($_REQUEST['flag'])){
    
    $flag=$_REQUEST['flag'];
    
    if($flag=="del"){
    
       $id=$_REQUEST['id'];
       
     
       
       
        if($empService->delEmpById($id)==2){           
        
               header("Location: error.php");
               exit();
        }else{ 

                header("Location: ok.php");
                exit();
            }
  }elseif ($flag=="addemp"){
       $id=$_POST['id'];
       $name=$_POST['name'];
       $email=$_POST['email'];
       $phone=$_POST['phone'];
       
       if(empty($id)||$id>1370){
         $res= $empService->addEmp($name, $email, $phone);
         if($res==2){
             
             header("Location: error.php");
             exit();
         }else{
             
             header("Location: ok.php");
             exit();
         }
       }
  }

}




?>