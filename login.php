<?php 
    require_once 'record.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>employees form</title>

  <style type="text/css">
    #loginContainer{ width: 30%; margin: 0 auto; text-align: center; }
  </style>
</head>
<body>
  <div id="loginContainer">
     <br/>
    <img src="./images/dac.png" width="15%" />
    <h1>Manager Login</h1>
    
    <form method="post" action="process.php" id="employee_form">
    
      <p>User ID&nbsp;
      <input type="text" id="usrid" name="usrid" minlength="3"  maxlength="3" required
      value="<?php echo getCookieVal("usrid"); ?>"
      autofocus="autofocus" /></p>

      <p>&nbsp;&nbsp;Password&nbsp;&nbsp;&nbsp;
      <input type="password" id="psw" name="psw"  minlength="3" maxlength="7" required
      value="<?php if(isset($_GET['psw'])) {echo $_GET['psw'];}?>" /></p>
      
      <p>&nbsp;&nbsp;CheckCode&nbsp;<input type="text" id="psw2" name="checkCode"   minlength="4" maxlength="4" required/> 
      <img src="checkCode.php" onclick="this.src='checkCode.php?aa='+Math.random()" /></p>
            
   
<!--       //需要在apache php.ini文件启用绘图库； -->
      
      
      <input type="checkbox" name="check" value="yes" checked />remember ID
      <p><input type="submit" />&nbsp;<input type="reset" /></p>  
    </form>
  </div>
    <script src="https://code.jquery.com/jquery-3.3.0.js"></script> 
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script type="text/javascript">
    // 声明式验证：程序员只需要声明各种验证规则，可以自定义验证错误信息

    // jQuery.noConflict()//多库共存概念

     
     
    jQuery('#emloyee_form').validate({

      
        messages: {
            usrid: {
                required: 'This field is required.',
                minlength: 'Please enter at least 3 characters.',//在上面加上required条件
                maxlength: 'Please enter no more than 3 characters.'
                
            },
            psw: {
                required: 'This field is required.',
                rangelength: 'Please enter at least 3 characters',
                maxlength: 'Please enter no more than 7 characters.'
            },
            checkCode: {
                required: 'This field is required.',
                rangelength: 'Please enter at least 4 characters',
                maxlength: 'Please enter no more than 4 characters.'
            },
        }
    });
</script>
</body>
  <?php

    
   //错误类型处理
    if( !empty( $_GET["errno"] ) ){
        
      $err = $_GET["errno"];
      
      if( $err == 1 ){
        echo "<script type='text/javascript'>alert('您的用户名或密码错误!');</script>";
        echo "<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color='red' size='3' >您的用户名或密码错误!</font>";
        
      }else if( $err == 2 ){
        // echo "<script type='text/javascript'>alert('用户名或密码不能为空!');</script>";
        echo "<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color='red' size='3' >USERNAME or PASSWORD can't be empty! </font>";
      }else if( $err == 3 ){
          echo "<script type='text/javascript'>alert('验证码出错!');</script>";
          echo "<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color='red' size='3' >验证码出错!!</font>";
    }
    
    }


    ?>
 


</html>