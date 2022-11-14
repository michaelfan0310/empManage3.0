<?php

    session_start();
    $checkCode="";
    
    for($i=0;$i<4;$i++){
        $checkCode.=dechex(rand(1,15));
    }
    
    $_SESSION['myCheckCode']=$checkCode;
    
    $img=imagecreatetruecolor(110, 40);
    
    $bgcolor=imagecolorallocate($img, 0, 0, 0);
    
    imagefill($img, 0,0, $bgcolor);
    
    $white=imagecolorallocate($img, 255, 255, 255);
    
    $blue=imagecolorallocate($img, 0,0, 255);    
   
    
    $red=imagecolorallocate($img, 255, 0, 0);
    
    $green=imagecolorallocate($img, 0, 255, 0);
    
    
    for($i=0;$i<20;$i++){
        imageline($img, rand(0,110), rand(0,30), rand(0,110), rand(0,30), imagecolorallocate($img, rand(0,255), 
            rand(0,255), rand(0,255)));        
    }
    
    imagestring($img, rand(1,5), rand(2,80), rand(2,10), $checkCode, $white);
    
    header("Content-type: image/PNG");
    imagepng($img);

?>