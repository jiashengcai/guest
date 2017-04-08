<?php
  /**
   * Created by PhpStorm.
   * User: cai
   * Date: 2017/4/8
   * Time: 19:46
   */
  require_once ('sql_class.php');
  $db=new db_Mysql();
  $db->dbServe='localhost';
  $db->dbBase='guest';
  $db->dbUser='root';
  $db->dbPwd='';
  $db->dbConnect();
  define('MCBOOKINSTALLED',true);
  define('TABLE_PREFIX','mb_');
  if (PHP_VERSION>'5.2.0')
  {
    date_default_timezone_set('PRC');
  }