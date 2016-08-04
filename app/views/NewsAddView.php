<?php
namespace app\views;
use framework\View;
class NewsAddView extends View
{
    public function showContent($data=[]){
        echo "
        <form action='../../news.php' method='POST' enctype='multipart/form-data'>
            <input type='hidden' name='action' value='create'>
            <div class=\"input-group\">
                <label for='title'>Название новости</label>
                <br>
                <input id='title' placeholder='введите название новости' type='text' name='title'>
            </div>
            <br>
            <div class=\"input-group\">
                <label for='content'>Новость</label>
                <br>
                <textarea id='content' placeholder='введите текст новости' type='text' name='content'></textarea>
            </div>
            <br>
            <div class=\"input-group\">
                <label for='inputfile'>Выберите файл для загрузки</label>
                <br>
                <input id='inputfile' type='file' name='picture'>
            </div>
            <br>
            <button type='submit' name='create'>Загрузить новость</button>
        </form>
        ";
    }
}