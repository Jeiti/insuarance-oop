<?php
namespace app\views;
use framework\View;
class FeedbackView extends View
{
    public function showContent($data = [])
    {
        echo "
        <form action='/feedback.php' method='post'>
        <input type='hidden' name='action' value='create'>
        <input type='hidden' name='tablename' value='feedbacks'>
            <div class=\"input-group\">
            <label>Введите Ваше имя</label>
            <br>
                <input type=\"text\" class=\"form-control\" placeholder=\"Username\" name=\"username\">
            </div>
            <br>
            <div class=\"input-group\">
            <label>Введите Ваш e-mail</label>
            <br>
                <input type=\"email\" class=\"form-control\" placeholder=\"email\" name=\"email\">
            </div>
            <br>
            <div class=\"input-group\">
            <label>Введите текст сообщения</label>
            <br>
                <textarea name='feedbacktext' id='' cols='50' rows='10'></textarea>
            </div>
            <br>
            <div class=\"input-group\">
                <input type='submit' name='send' value='Отправить'>
            </div>
        </form>
        ";
    }
}