<?php
header("Content-type:text/html; charset=utf-8");
require_once ("../config.inc");
abstract class Model
{
    protected $subd;
    protected $tablename;

    public function __construct(ISubd $_subd) {
        //TODO: Мы не можем создавать экземпляр абстактного класса, как быть?
        // Думаю, что унаследовав этот класс, у класса-наследника можно переопределить метод __construct
        //если этого не делать, сработает именно этот метод при создании экземпляра унаследованного класса,
        // вопрос - как передать сюда в этот метод указанный параметр
        $this->subd = $_subd;
        if(!$this->subd->isConnected()){
            throw new ModelException("Нет соединения с БД");
        }
    }
    public function __destruct() {
        $this->subd->disconnect();
    }

//TODO: разделить/применить принцип единственной/единой ответственности -> single
//Предлагаю сделать следующую структуру:
//Сделать функции например (select, insert, update, delete), в конце return
//В этих функциях прописать прием параметров, и на основании этого построение запроса
//А функции all, find, create выделить в отдельный класс например class functions с использованием Reflection
//и в зависимости от пришедшего класса определить поведение функции
//функцию error выделить в отдельный класс class Errors и там определить поведение при ошибке.

//TODO: Применить принцип -> OSR открытости/закрытости, абстрагироваться от конкретной СУБД
//Создать интерфейс iSUBD в котором создать private метод changeSubd($message)
//Создать public function change();   {$this->changeSubd($message)}
//В этом классе в методе construct сделать проверку входящего класса (ClassnameiSUBD $peremSubd, $commandConnectSubd)
//В этом классе создать protected $subd
//В этом классе создать protected $commandConnectSubd
//В этом классе в методе construct осуществить выбор СУБД - $this->SUBD = $peremSubd;
// $this->commandConnectSubd = $commandConnectSubd;
// $this->commandConnectSubd(DBHOSTNAME, DBUSER, DBPASSWORD, DBBDNAME)

//TODO: Создать класс SQLiteSubd

//TODO: Интерфейс можно применить к сущности имеющей НАБОР МЕТОДОВ и часть, которая БУДЕТ МЕНЯТЬСЯ->
//TODO:->(чтобы часть была изменяемой ее надо выделить в отдельный класс и абстрагировать(implements ISubd)
//TODO:->эту часть в виде интерфейса, а в интерфейсе описать публичные общие методы для работы с подобными сущностями)

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
        $tablename = $values[0];


        //блок формирования строки запроса INSERT
        $insert = "INSERT INTO $tablename ("; //вставляем название таблицы


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