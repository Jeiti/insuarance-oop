<?php

interface ISubd
{
    public function connect($dbName, $host, $login, $password);
    public function isConnected();
    public function query($sqlQuery);
    public function disconnect();
    public function getSqlError();
}