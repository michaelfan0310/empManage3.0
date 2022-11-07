<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>员工信息列表</title>
  <style type="text/css">
    *{ margin: 0; padding: 0; }
    .mainContainer{ width: 1140px; margin: 0 auto; text-align: center; margin-top: 40px; }
    .mainContainer table,form,p{ margin-top: 20px; }
    .account{ position: absolute; right: 20px; top: -5px; }
    th, td{ width: 120px; padding-bottom: 20px; }
    th{ padding-top: 20px; }
    a{ text-decoration: none; display: inline-block; color: #00f; }
    a:hover{ background-color: #c63; }
    .td50{ width:70px; word-break:break-word; }
    .returnTop{ position: fixed; width: 60px; height: 60px; text-align: center; line-height: 60px; font-size: 14px; right: 20px; bottom: 20px; background-color: #ccc; }
/*     #listContainer{width=100%;  margin: 0 auto; margin-top: 20px; } */
    
  </style>
</head>



 <body>
<div id="listContainer">
 <br/><br/>
   <h1 style="margin-left:25%;">员工信息列表</h1> 
   <br/><br/>
     <table border='1' cellspacing='0px'; style="border-color:lightgreen;width:80%;">
      <tr>        
        <th>员工号</th><th>姓名</th><th>邮件</th><th>电话</th><th>修改员工</th><th>删除员工</th>
      </tr>
      
    </table>
 
    
<?php
   require_once 'EmpService.class.php';
   require_once 'PageItem.class.php';


   $pageItem= new PageItem();//引入pageItem
   
   $pageItem->pageSize=10;
  
   $pageItem->pageNow=1;
   //empty 函数很重要；
   if(!empty($_GET['pageNow'])){
       $pageItem->pageNow=$_GET['pageNow'];
   }
   
   $empService= new EmpService();
   
   $empService->getPaging($pageItem);
   

   for($i=0;$i<count($pageItem->res_array);$i++){
       $row=$pageItem->res_array[$i];
       
    echo ' <table border=1 bordercolor="lightgreen" cellspacing="0px" width="80%;">';
    echo "<tr>        
        <td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['phone']}</td>".
        "<td><a>修改员工</a></td><td><a>删除员工</a></td>
      </tr>";
    echo " </table >";
    }
    
    echo $pageItem->navigate;
    
//     //显示 上一页、下一页
//     if($pageItem->pageNow>1){
//         $prePage=$pageItem->pageNow-1;
       
//         echo "<a href='empList.php?pageNow=$prePage'> 上一页&nbsp;</a>";   
//     }
    
//     if ($pageItem->pageNow<$pageItem->pageCount){
//         $nextPage=$pageItem->pageNow+1;
//         echo "<a href='empList.php?pageNow=$nextPage'> 下一页&nbsp;&nbsp;</a>";}
     
//      $page_whole=10;
//      $start= floor(($pageItem->pageNow-1)/$page_whole) *$page_whole + 1; 
//      $index=$start;
     
//      if($pageItem->pageNow>$page_whole){
//          echo "<a href='empList.php?pageNow=".($start-1)."'>&nbsp;<<&nbsp;&nbsp;</a>";
//      }
     
//      for(;$start<$index+$page_whole;$start++){
//          echo "<a href='empList.php?pageNow=$start'>[$start]</a>";
//      }
//         //整体10页翻动；
      
        
//         echo "<a href='empList.php?pageNow=$start'>&nbsp;&nbsp;>>&nbsp;</a>";
        
        

        
//         echo "&nbsp;当前页 $pageItem->pageNow/共有 $pageItem->pageCount 页"; 


// mysqli_free_result($res1);
// mysqli_free_result($res2);

// mysqli_close($sqlHelper->conn);
?>

<form action="empList.php" >

跳转到：<input type="text" name="pageNow"  />
      <input type="submit" value="GO" />
</form>
</div>
</body>
</html>

