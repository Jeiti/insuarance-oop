<?php
namespace main;
use \Exception;
class InsuaranceException extends Exception
{
    public function __construct($message, $code, $file, $line, Exception $previous=null)
    {
        parent::__construct($message, $code, $previous);
        $this->file = $file;
        $this->line = $line;

    }
}
