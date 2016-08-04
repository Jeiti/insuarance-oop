<?php
namespace app\views;
class TestView
{
    public function showLayout($_data){
        //$_data = new ArrayObject([]);
        print_r($_data);
    }
}