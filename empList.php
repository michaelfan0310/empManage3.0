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
  <script type="text/javascript">
<!--
         function confirmDel(val){
            return window.confirm("是否删除Id="+val+"的用户");
         }
//-->
  </script>
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

   $empService= new EmpService();
   
//    if(!empty($_GET['flag'])){
//        $id=$_GET['id'];
//        $empService->delEmpById($id);       
//    }
   
   
   $pageItem= new PageItem();//引入pageItem
   
   $pageItem->pageSize=10;  
   $pageItem->pageNow=1;
   $pageItem->gotoUrl="empList.php";
   
   //empty 函数很重要；
   if(!empty($_GET['pageNow'])){
       $pageItem->pageNow=$_GET['pageNow'];
   }
   
  
   
   $empService->getPaging($pageItem);
   

   for($i=0;$i<count($pageItem->res_array);$i++){
       $row=$pageItem->res_array[$i];
       
    echo ' <table border=1 bordercolor="lightgreen" cellspacing="0px" width="80%;">';
    echo "<tr>        
        <td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['phone']}</td>".
        "<td><a href='updateEmpUI.php?id={$row['id']}'>修改员工</a></td>
        <td><a onclick='return confirmDel({$row['id']})' href='empProcess.php?flag=del&id={$row['id']}'>删除员工</a></td>
      </tr>";
    echo " </table >";
    }
    
    echo $pageItem->navigate;
    

?>

<form action="empList.php" >

跳转到：<input type="text" name="pageNow"  />
      <input type="submit" value="GO" />
</form>
</div>
</body>
</html>

