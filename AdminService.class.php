<?php

    require_once 'SqlHelper.class.php';
    //业务处理
    class AdminService{
        
      public function checkAdmin($usrid,$password){
          $sql="select password, name from user_admin where adminid=$usrid";
          //创建SqlHelper对象
          
          $sqlHelper=new SqlHelper();
          
          $res=$sqlHelper->execute_dql($sql);
          
          if($row=mysqli_fetch_assoc($res)){
              
              if(md5($password)==$row['password']){
                  return $row['name'];
              }
          }
          //资源
          mysqli_free_result($res);
          //连接
          $sqlHelper->close_connect();
          return "";
      }
        
    }



?>