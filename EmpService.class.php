<?php

    require_once 'SqlHelper.class.php';
    
    class EmpService{
        
            //第一种分页方法 
      function getPageCount($pageSize){
        
        $sql="select count(id) from employees_basic";
        
        $sqlHelper= new SqlHelper();
        
        $res=$sqlHelper->execute_dql($sql);
        
        if($row=mysqli_fetch_row($res)){
            $pageCount=ceil($row['0']/$pageSize);
        }
        
        mysqli_free_result($res);
        $sqlHelper->close_connect();
            
        return $pageCount;
        
      }

     function getEmpListByPage($pageNow,$pageSize){
         
         $sql="select * from employees_basic limit ".$pageSize*($pageNow-1).",$pageSize";
         $sqlHelper= new SqlHelper();
         
         $res= $sqlHelper->execute_dql2($sql);//dql2被使用
         
// mysqli_free_result($res);已关闭
         $sqlHelper->close_connect();
         
         return $res;
         
     }
     
     //第二种分装方式完成的分页；
     function getPaging($pageItem){
         $sqlHelper=new SqlHelper();
         $sql1="select * from employees_basic limit ".$pageItem->pageSize*($pageItem->pageNow-1).",$pageItem->pageSize";
         $sql2="select count(id) from employees_basic";
         
         $sqlHelper->execute_dql_page($sql1, $sql2, $pageItem);
         $sqlHelper->close_connect();
     }
     function delEmpById($id){
         $sqlHelper=new SqlHelper();
         $sql="delete from employees_basic where id=$id";
         
         return $sqlHelper->execute_dml($sql);//一直犯错，没有return
         $sqlHelper->close_connect();
         
     }
     function addEmp($name,$email,$phone){
         $sqlHelper=new SqlHelper();
         
         $sql="insert into employees_basic (name,email,phone) values('$name','$email','$phone')";
         
         return $sqlHelper->execute_dml($sql);   
         
         
         $sqlHelper->close_connect();
     }
     function getEmpById($id){
         $sqlHelper=new SqlHelper();
         
         $sql="select * from employees_basic where id='$id'";
         
         $arr= $sqlHelper->execute_dql2($sql);      
           
         $sqlHelper->close_connect();
         return $arr;  
     }
     function updateEmp($id,$name,$email,$phone){
         $sqlHelper=new SqlHelper();
         
         $sql="UPDATE employees_basic 
               SET name='$name',email='$email', phone='$phone'//注意变量string加yinhao
               WHERE id=$id;";
         
         return $sqlHelper->execute_dml($sql);
         
         
         $sqlHelper->close_connect();
     }
     
    }
?>