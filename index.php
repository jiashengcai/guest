<?php
  /**
   * Created by PhpStorm.
   * User: cai
   * Date: 2017/4/8
   * Time: 21:49
   */
  require_once ('include/config.php');
  $sql="select * from ".TABLE_PREFIX."message order by settop desc,id desc";
  $total=$db->getRows($sql);
  var_dump($total);
