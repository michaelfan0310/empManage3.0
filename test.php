<?php


session_start();
$checkCode="";

for($i=0;$i<4;$i++){
    $checkCode.=dechex(rand(1,15));
}

echo $checkCode;









?>