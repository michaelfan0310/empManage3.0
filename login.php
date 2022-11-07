<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>员工信息系统——管理员登录</title>
  <style type="text/css">
    #loginContainer{ width: 30%; margin: 0 auto; text-align: center; }
  </style>
</head>

<body>
  <div id="loginContainer">
    <h1>管理员登录</h1>
    <form method="post" action="process.php">
      <p>用户ID&nbsp;
      <input type="text" id="usrid" name="usrid" value="<?php if(isset($_GET['usrid'])) { echo $_GET['usrid']; } ?>" 
      autofocus="autofocus" /></p>

      <p>&nbsp;&nbsp;密码&nbsp;&nbsp;&nbsp;
      <input type="password" id="psw" name="psw" value="<?php if(isset($_GET['psw'])) {echo $_GET['psw'];}?>" /></p>

      <p><input type="submit" />&nbsp;<input type="reset" /></p>  
    </form>
  </div>

  <?php
    //错误类型处理
    if( !empty( $_GET["error"] ) ){
        
      $err = $_GET["error"];
      
      if( $err == 1 ){
        echo "<script type='text/javascript'>alert('您的用户名或密码错误!');</script>";
        echo "<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color='red' size='3' >您的用户名或密码错误!</font>";
        
      }else if( $err == 2 ){
        echo "<script type='text/javascript'>alert('用户名或密码不能为空!');</script>";
        echo "<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color='red' size='3' >用户名或密码不能为空!</font>";
      }
    }
  ?>
</body>
</html>