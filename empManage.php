

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>员工信息管理系统</title>
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
  </style>
</head>
<img src="./images/dac.png" width="10%" />
<br/>
<?php

    $usr=$_GET['username'];

    echo $usr."登录成功！！";

echo "<a href='login.php'>返回重新登录</a><hr/>";
?>
<body>

    <h1>系统主界面</h1>
 
      <a href="empList.php" target="_self">管理用户</a><br />
      <a href="addEmp.php" target="_self">添加用户</a><br />
      <a href="#" target="_self">查询用户</a><br />
      <a href="#" target="_self">退出系统</a><br />

<hr/> 
<img src="./images/hello.png" width="16%"/>
 
</body>
</html>
