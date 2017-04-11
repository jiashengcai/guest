<?php
  /**
   * Created by PhpStorm.
   * User: cai
   * Date: 2017/4/8
   * Time: 21:49
   */
  require_once ('include/config.php');
  require_once('include/page_class.php');
  $page=new Page();
  if (isset($_GET['page'])&&$_GET['page']!=null)
  {
    $pagination=$_GET['page'];
  }else
  {
    $pagination=1;
  }
  $sql="select * from ".TABLE_PREFIX."message order by settop desc,id desc";
  $total=$db->getRows($sql);
  if ($total!=0)
  {
    $pagination=$page->pageData(5,$total,"?page");
    //$rs=$db->execute($sql."limit".$page->offset)
    $rs=$db->execute($sql." limit $page->offset,$page->pageSize");
    while($rows=$db->fetchArray($rs))
    {
      var_dump($rows);
    }

  }
