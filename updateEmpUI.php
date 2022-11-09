<?php

require_once 'EmpService.class.php';

$empService= new EmpService();

$id=$_GET['id'];

$arr=$empService->getEmpById($id);

// echo "$arr";

// exit();

?>


<img src="./images/dac.png" width="10%" />
<hr/>
    <h1>更改员工信息</h1>
    <form method="post" action="empProcess.php">
    
     <table >
      <tr><td>员工号</td><td><input readonly="readonly" type="text" name="id" value="<?php echo $arr[0]['id'] ?>"/></td></tr>
      <tr><td>姓&nbsp;名</td><td><input type="text" name="name" value="<?php echo $arr[0]['name'] ?>"/></td></tr>
      <tr><td>邮&nbsp;件</td><td><input type="text" name="email" value="<?php echo $arr[0]['email'] ?>"/></td></tr>
      <tr><td>电&nbsp;话</td><td><input type="text" name="phone" value="<?php echo $arr[0]['phone'] ?>" /></td></tr>
      
      <tr><td><input type="hidden" name="flag" value="updateemp" /></td></tr>
       
      <tr>
      <td><input type="submit" value="更改员工" /></td>
      <td><input type="reset"  value="重新填写" /></td>
      </tr>
      
    </table>
      
    </form>

<hr/> 
<img src="./images/hello.png" width="20%"/>
 
