<?php
  class db_Mysql
  {
    /**
     * 用户名
     * @var String
     * $result 执行query命令的指针
     * $num_row  返回的条目数
     * $insert_id  传回最后一次使用的INSERT指令的ID
     * $affected_rows 传回query命令所影响的列数目
     */
    var $dbServe;
    var $dbDataBase;
    var $dbBase;
    var $dbUser;
    var $dbPwd;
    var $dbLink;
    var $result;
    var $num_row;
    var $insert_id;
    var $affected_rows;
    /*
     * 获得数据库的连接
     */
    public function dbConnect()
    {
      $this->dbLink=@mysql_connect($this->dbServe,$this->dbUser,$this->dbPwd);
      if(!$this->dbLink)
      {
        $this->dbHalt('Cant connect to database');
      }
      if($this->dbBase=="")
        $this->dbBase=$this->dbDataBase;
      if (!@mysql_select_db($this->dbDataBase,$this->dbLink))
        $this->dbHalt('Database not exit');
      mysql_query("SET NAMES 'gbk'");
    }
    /*
     * query查询
     */
    public function execute($sql)
    {
      $this->result=mysql_query($sql);
      return $this->result;
    }

    public function fetchArray($result)
    {
      return mysql_fetch_array($result);
    }

    public function getRows($sql)
    {
      return mysql_num_rows(mysql_query($sql));
    }

    public function numRows ($result)
    {
      return mysql_num_rows($result);
    }

    public function dataSeek($result,$rowNumber)
    {
      return mysql_data_seek($result,$rowNumber);
    }

    public function dbHalt($errorMsg='database is wrong')
    {
      echo $errorMsg;
      die();
    }

    public function delete($sql)
    {
      $result=$this->execute($sql);
      $this->affected_rows=mysql_affected_rows($this->dbLink);
      $this->freeResult($result);
      return $this->affected_rows;
    }

    public function insert($sql)
    {
      $result=$this->execute($sql);
      $this->insert_id=mysql_insert_id($this->dbLink);
      $this->freeResult($result);
      return $this->insert_id;
    }

    public function update($sql)
    {
      $result=$this->execute($sql);
      $this->affected_rows=mysql_affected_rows($this->dbLink);
      $this->freeResult($result);
      return $this->affected_rows;

    }

    public function getNmn($result)
    {
      return mysql_num_rows($result);
    }

    public function freeResult($result)
    {
      return mysql_free_result($result);
    }

    public function dbClose()
    {
      mysql_close($this->dbLink);
    }

  }