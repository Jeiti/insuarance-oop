<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
class FeedbackModel extends Model
{
    //TODO: Думаю такой вариант подойдет в качестве основного метода для framework/Model.php
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

}