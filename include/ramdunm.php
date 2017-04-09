<?php
  /**
   * Created by PhpStorm.
   * User: cai
   * Date: 2017/4/8
   * Time: 22:18
   *
   *生成随机验证码
   */
  session_start();
  $width=50;
  $height=20;
  $img=imagecreate($width,$height);//生成一张图片
 $time=4;
  $arr1=range('0','9');
  $arr2=range('a','z');
  $arr3=range('A','Z');
  //$arr=array_merge($arr1,$arr2,$arr3);
  $keys=array_rand($arr1,$time);
  $str="";
  foreach ($keys as $i)
  {
    $str.=$arr1[$i];
  }
  $_SESSION["randValid"]=$str;

  /*
   * 设置干扰素条数，颜色
   */
  for ($i=0;$i<$time*10;$i++)
  {
    $color=imagecolorallocate($img,rand(0,255),rand(0,255),rand(0,255));  //干扰素颜色
    imageline($img,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),$color);
    imagesetpixel($img,rand(0,$width),rand(0,$height),$color);
  }
  //把验证码加到图片图片中去
  $color=imagecolorallocate($img,255,255,255);
  imagestring($img,5,5,5,$str,$color);
  
  header("content-type:image/png");
  imagepng($img);
  imagedestroy($img);




