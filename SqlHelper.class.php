<?php

//     require_once 'PageItem.php';
    
    class SqlHelper{
        
        
       public $conn;
       public $host="localhost:3306";
       public $dbname="empManage";
       public $username="root";
       public $password="236440Wf!";
       
       public function __construct(){
           $this->conn=mysqli_connect($this->host,$this->username,$this->password,$this->dbname);
           if(!$this->conn){
               die("连接失败".mysqli_connect_errno());
          
               echo "Error: Unable to connect to MySQL." . PHP_EOL;
               echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
               echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
               exit;
           }
           
//            echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//            echo "Host information: " . mysqli_get_host_info($this->conn) . PHP_EOL;
       }
       
       public function execute_dql($sql){
           $res=mysqli_query($this->conn, $sql) or die(mysqli_error());
           return $res;                 
       }

       public function execute_dql2($sql){
           $arr=array();
           $res=mysqli_query($this->conn, $sql) or die(mysqli_error());
           $i=0;
           while ($row=mysqli_fetch_assoc($res)){
               $arr[$i++]=$row;  //$arr[]=$row;语句也可以；
           }
           mysqli_free_result($res);
           
           return $arr;
       }
       public function execute_dml($sql){
           $b=mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
           
           if(!$b==1){
               return 0;
           }else{
               if(mysqli_affected_rows($this->conn)>0){
                  
                   return 1;  //表示执行OK
               }else{
                   return 2;  //表示没有行受到影响
               }          
            }
          }
       
       public function execute_dql_page($sql1,$sql2,&$pageItem){
           
           $res1=mysqli_query($this->conn, $sql1) or  die(mysqli_error($this->conn));
           $arr=array();
           
           
           while ($row=mysqli_fetch_assoc($res1)){
               $arr[]=$row;
           }
           mysqli_free_result($res1);
           
           
           $res2=mysqli_query($this->conn, $sql2) or  die(mysqli_error($this->conn));
           
           if($row=mysqli_fetch_row($res2)){
               $pageItem->pageCount=ceil($row[0]/$pageItem->pageSize);
               $pageItem->rowCount=$row[0];
           }
           mysqli_free_result($res2);
           
           
           //封装导航信息       
            $navigate="";          
           //显示 上一页、下一页
           if($pageItem->pageNow>1){
               $prePage=$pageItem->pageNow-1;
               
               $navigate= "<a href='$pageItem->gotoUrl?pageNow=$prePage'> 上一页&nbsp;</a>";
           }
           
           if ($pageItem->pageNow<$pageItem->pageCount){
               $nextPage=$pageItem->pageNow+1;
               $navigate.= "<a href='$pageItem->gotoUrl?pageNow=$nextPage'> 下一页&nbsp;&nbsp;</a>";}
               
           $page_whole=10;
           $start= floor(($pageItem->pageNow-1)/$page_whole) *$page_whole + 1;
           $index=$start;
           
           if($pageItem->pageNow>$page_whole){
               $navigate.= "<a href='$pageItem->gotoUrl?pageNow=".($start-1)."'>&nbsp;<<&nbsp;&nbsp;</a>";
           }
           
           for(;$start<$index+$page_whole;$start++){
               $navigate.= "<a href='$pageItem->gotoUrl?pageNow=$start'>[$start]</a>";
           }
           //整体10页翻动；
           
           
           $navigate.= "<a href='$pageItem->gotoUrl?pageNow=$start'>&nbsp;&nbsp;>>&nbsp;</a>";
           
           
           
           
           $navigate.= "&nbsp;当前页 $pageItem->pageNow/共有 $pageItem->pageCount 页"; 
           
           $pageItem->navigate= $navigate;
           
           $pageItem->res_array = $arr;
                     
       }
       //关闭连接？  
       public function close_connect(){
           if(!empty($this->conn)){
               mysqli_close($this->conn);
           }           
       }
       
       
       
    }


?>