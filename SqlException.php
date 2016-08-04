<?php
namespace main;
class SqlException extends InsuaranceException
{
    public function __construct($message)
    {
        parent::__construct($message, 0, __FILE__, __LINE__, NULL);
    }
}