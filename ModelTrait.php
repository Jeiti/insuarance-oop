<?php

trait ModelTrait
{
    abstract public function find($data);
    abstract public function create($data);
}