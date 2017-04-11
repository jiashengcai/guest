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

  /*
   * 关于生成图片的函数
   * imagecreatetruecolor() 生成一张背景颜色为黑色的图片用imagefii()填充颜色
   * imagecreate()imagecolorAllocate()添加背景色(必须填充)
   *imagecolorallocate()  设置颜色
   */
  $img=imagecreate($width,$height);//生成一张图片,背景颜色随机
 $time=4;
  $arr1=range('0','9');
  $arr2=range('a','z');
  $arr3=range('A','Z');
  //$arr=array_merge($arr1,$arr2,$arr3);
  $arr=array_merge($arr1);
  //var_dump($arr);
  $keys=array_rand($arr,$time);
  //var_dump($keys);
  $str="";
  foreach ($keys as $i)
  {
    $str.=$arr[$i];
  }
  $_SESSION["randValid"]=$str;

  /*
   * 设置干扰素条数，颜色
   */
  for ($i=0;$i<$time*5;$i++)
  {
    $color=imagecolorallocate($img,rand(0,255),rand(0,255),rand(0,255));  //干扰素颜色
    imageline($img,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),$color);//生成线条
  }
  //把验证码加到图片图片中去
  $color=imagecolorallocate($img,255, 255, 255);
  imagestring($img,5,5,3,$str,$color);

  header("content-type:image/png");
  imagepng($img);
  imagedestroy($img);




