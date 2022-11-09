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

<body>

    <h1>添加员工</h1>
    <form method="post" action="empProcess.php">
    
     <table >
      <tr><td>员工号</td><td><input type="text" name="id" /></td></tr>
      <tr><td>姓&nbsp;名</td><td><input type="text" name="name" /></td></tr>
      <tr><td>邮&nbsp;件</td><td><input type="text" name="email" /></td></tr>
      <tr><td>电&nbsp;话</td><td><input type="text" name="phone" /></td></tr>
      
      <tr><td><input type="hidden" name="flag" value="addemp" /></td></tr>
       
      <tr>
      <td><input type="submit" value="添加员工" /></td>
      <td><input type="reset"  value="重新填写" /></td>
      </tr>
      
    </table>
      
    </form>

<hr/> 
<img src="./images/hello.png" width="20%"/>
 
</body>
</html>
