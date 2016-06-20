<?php
require_once ("config.inc");
class Model
{
    protected $link;
    public function __construct() {
        $this->link = mysqli_connect(DBHOSTNAME, DBUSER, DBPASSWORD, DBBDNAME);
    }
    public function __destruct() {
        mysqli_close($this->link);
    }

    public function all() {
        $res=mysqli_query($this->link,"select * from news");
        $array=[];
        if(!$res){
            echo mysqli_error($this->link);
        }
        else{
            while($rows=mysqli_fetch_array($res)){
                //--------------определение переменных для передачи в массив json --------------/
                $content = $rows['content'];
                $title =   $rows['title'];
                $id =      $rows['id'];
                $picture = $rows['picture'];
                //--------------конец определения переменных --------------/
                if (strlen($content)>120){//если длина строки больше 120 символов, тогда
                    $content = substr($content,0,120);//обрезать строку до 120 символов
                    $content.="...";
                }
                $array[] = ['title'=>   iconv(mb_detect_encoding($title), "UTF-8", $title),//iconv - функция для изменения кодировки передаваемого текста
                    'content'=> @iconv(mb_detect_encoding($content), "UTF-8", $content),//iconv - функция для изменения кодировки передаваемого текста
                    'id'=>      $id,
                    'picture'=> $picture
                ];
            }
        }
        return $array;
    }

    public function find($id){
        $res = mysqli_query($this->link, "select  title, content, picture, date_time from news where id=$id");
        $row=mysqli_fetch_array($res);
        return $row;
    }

    public function create($data){
        return mysqli_query($this->link, "INSERT INTO news (title, content, picture, date_time) VALUES ($data[title], $data[content], $data[picture], date('y.m.d H:i'))");
    }
}