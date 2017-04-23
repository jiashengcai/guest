<?php
  /**
   * Created by PhpStorm.
   * User: cai
   * Date: 2017/4/8
   * Time: 21:49
   */
  require_once ('include/config.php');
  require_once('include/page_class.php');
  session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Title of the document</title>
</head>
<body>
<?php
  $page=new Page();

  if (isset($_GET['page'])&&$_GET['page']!=null)
  {
    $pagination=$_GET['page'];
  }else
  {
    $pagination=1;
  }
  $sql="select * from ".TABLE_PREFIX."message order by settop desc,id desc";
  $total=$db->getRows($sql);//获得条数
  if ($total!=0)
  {
    $pagination=$page->pageData(5,$total,"?page");//页数
    //$rs=$db->execute($sql."limit".$page->offset)

    $rs=$db->execute($sql." limit $page->offset,$page->pageSize");
    while($rows=$db->fetchArray($rs))
    {
      $log=$rows['userlog'];
      echo "<img src=$log >";//头像
      echo $rows['username'];//输出
      //用户名
      echo $rows['content'];//留言内容
      echo $rows['systime'];//留言的时间
      echo"<br>";
    }

  }
?>

</body>
</html>
