<?php

class NewsModel
{
    private $link;
    public function __construct()
    {
        $this->link = mysqli_connect(DBHOSTNAME,DBUSER,DBPASSWORD,DBBDNAME);
    }
    public function __destruct()
    {
        mysqli_close($this->link);
    }

    public function find($id){
        $res = mysqli_query($this->link, "select  title, content, picture, date_time from news where id=$id");
        $row=mysqli_fetch_array($res);
        return $row;
    }
}