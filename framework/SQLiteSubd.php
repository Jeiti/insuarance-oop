<?php
namespace framework;
class SQLiteSubd implements ISubd{
    private $link;

    public function connect($dbName, $host, $login, $password){
        $this->link = sqlite_open("$dbName");
    }
    public function isConnected(){

    }
    public function query($sqlQuery){

    }
    public function disconnect(){
        sqlite_close($this->link);
    }
    public function getSqlError(){

    }
}