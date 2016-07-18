<?php

class MySqlSubd implements ISubd
{
    private static $link=NULL;


    private function __construct($dbName, $host, $login, $password){
        $this->connect($dbName, $host, $login, $password);
    }

    public static function createInstance($dbName, $host, $login, $password){
        if(is_null(self::$link)){
            self::$link = new self($dbName, $host, $login, $password);
        }
    }

    private function __clone(){

    }

    public function connect($dbName, $host, $login, $password){
        self::$link = mysqli_connect($host, $login, $password, $dbName);
    }
    public function isConnected()
    {
        return !is_null(self::$link);
        //is_null - возвращает true, если переменная = NULL
    }

    public function query($sqlQuery){
        return (mysqli_query(self::$link, $sqlQuery));
    }


    public function disconnect(){
        mysqli_close(self::$link);
    }


    public function getSqlError(){
        return (mysqli_error(self::$link));
    }
}
//TODO: применить шаблон проектирования "ОДИНОЧКА" к данному классу, чтобы реализовать одно соединение с БД.