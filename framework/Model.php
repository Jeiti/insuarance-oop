<?php
require_once("config.inc");
abstract class Model
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
                if(mb_detect_encoding($content)=="UTF-8"){
                    $array[] = ['title'=>   @iconv(mb_detect_encoding($title), "UTF-8", $title),//iconv - функция для изменения кодировки передаваемого текста
                        'content'=> $content,
                        'id'=>      $id,
                        'picture'=> $picture
                    ];
                }
                else{
                    $array[] = ['title'=>   iconv(mb_detect_encoding($title), "UTF-8", $title),//iconv - функция для изменения кодировки передаваемого текста
                        'content'=> @iconv(mb_detect_encoding($content), "UTF-8", $content),//iconv - функция для изменения кодировки передаваемого текста
                        'id'=>      $id,
                        'picture'=> $picture
                    ];
                }
            }
        }
        return $array;
    }

    public function find($id){
        $res = mysqli_query($this->link, "select  title, content, picture, date_time from news where id=$id");
        $row=mysqli_fetch_array($res);
        return $row;
    }

    public function create($data){ //получаем массив $_POST или $_GET

        $data = array_splice($data,1,-1);//обрезаем массив,а именно вырезаем первый и последний элемент


        //разделить массив на 2 массива с числовыми индексами - в 1 ключи, во 2 - значения
        $arr = new ArrayObject($data);
        $keys=[];
        $values=[];
        for($i=$arr->getIterator(); $i->valid(); $i->next()){
            $keys[] = $i->key();
            $values[] = $i->current();
        }//конец блока - "разделить массив на 2"



        //блок формирования строки запроса INSERT
        $insert = "INSERT INTO $values[0] ("; //вставляем название таблицы

        $keys = array_slice($keys,1);//вырезаем название таблицы из массива
        $values = array_slice($values,1);//вырезаем название таблицы из массива

        $arr = new ArrayObject($keys);
        for($i=$arr->getIterator();$i->valid();$i->next()){
            $insert = $insert . "" . $i->current() . "" . ", ";
        }
        $insert .= " date_time) VALUES (";

        $arr = new ArrayObject($values);
        for($i=$arr->getIterator();$i->valid();$i->next()){
            $insert = $insert . "'" . $i->current() . "'" . ", ";
        }

        $insert .= "'" . date('y.m.d H:i') . "');";
        //конец блока формирования строки запроса INSERT



        $res = mysqli_query($this->link, $insert);

        if (!$res){
            throw new SqlException($this->error());
        }
        return $res;
    }

    public function error(){
        return mysqli_error($this->link);
    }
}