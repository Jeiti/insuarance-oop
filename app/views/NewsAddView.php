<?php

class NewsAddView extends View
{
    public function showContent($data=[]){
        echo "
        <form action='../../news.php' method='POST' enctype='multipart/form-data'>
            <input type='hidden' name='action' value='create'>
            <label for='title'>Название новости</label>
            <input id='title' placeholder='введите название новости' type='text' name='title'>
            <br>
            <label for='content'>Новость</label>
            <textarea id='content' placeholder='введите текст новости' type='text' name='content'></textarea>
            <br>
            <label for='inputfile'>Выберите файл для загрузки</label>
            <input id='inputfile' type='file' name='picture'>
            <br>
            <button type='submit' name='create'>Загрузить новость</button>
        </form>
        ";
    }
}