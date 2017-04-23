<?php
  /**
   * Created by PhpStorm.
   * User: cai
   * Date: 2017/4/8
   * Time: 20:07
   *       分页类
   * pageSize  每页展示的条数
   * numRows  数据里所有留言的数目
   * pages  总的页数
   * page  当前页
   * offset
   * url  get提交的地址
   */
  class Page
  {
    var $pageSize;
    var $numRows;
    var $pages;
    var $page;
    var $offset;
    var $url;

    /*
     * $str1 pageSize
     * $str2 numRows
     * $str3 url
     *
     */
    public function pageData($str1=5,$str2,$str3)
    {
      global  $pageSize,$offset;
      $this->pageSize=$str1;
      $this->numRows=$str2;
      $this->url=$str3;
      $this->pages=intval($this->numRows/$this->pageSize);
      if ($this->numRows%$this->pageSize)
      {
        $this->pages++;
      }

      @$nPage=$_GET['page'];
//      if ($nPage!=null&&!preg_match('/^\d+$',$nPage))
//      {
//        echo "错误的参数类型";
//        return false;
//      }
      if (isset($nPage))
      {
        $this->page=intval($nPage);
      }else
      {
        $this->page=1;
      }
      if($nPage>$this->pages||$nPage<1)
      {
        $this->page=1;
      }
      $this->offset=$this->pageSize*($this->page-1);
      $pageSize=$this->pageSize;
      $offset=$this->offset;
    }
    public function pageShow()
    {
      echo "第[".$this->page."/".$this->pages."]页";
      for ($i=1;$i<=$this->pages;$i++)
      {
        if ($i==$this->page)
        {
          echo "<span>".$i."</span>";
        }else
        {
          echo "<a href='".$this->url."=".$i."'>".$i."</a>";
        }
      }
    }
  }