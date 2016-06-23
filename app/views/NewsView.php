<?php

class NewsView extends View
{
    function showContent($data=[]){
        echo "
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <img class=\"img-rounded\" alt=\"Bootstrap Image Preview\" src= /img/news_img/$data[picture]>
                </div>
                <div class=\"col-md-8\">
                    <p>$data[date_time]</p>
                    <h2>$data[title]</h2>
                    <p>$data[content]</p>
                </div>
            </div>
        </div>";
    }
}