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
    }
?>