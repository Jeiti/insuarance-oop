<?php
namespace app\views;
use framework\View;
class NewsAddView extends View
{
    public function showContent($data=[]){
        echo ">
                <label for='inputfile'>Выберите файл для загрузки</label>
                <br>
                <input id='inputfile' type='file' name='picture'>
            </div>
            <br>
            <button type='submit' name='create'>Загрузить новость</button>
        </form>
        \"";
    }
}