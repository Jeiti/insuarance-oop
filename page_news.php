<?php
header("Content-type:text/html; charset=utf-8");
require_once ("config.inc");
$link = mysqli_connect(DBHOSTNAME,DBUSER,DBPASSWORD,DBBDNAME);

if(!$link){
    echo mysqli_error($link);
}
else{
    $res = mysqli_query($link, "select  title, content, picture, date_time from news where id= " . $_GET['new']);
    if(!$res){
        echo mysqli_error($link);
    }
    else{
        $row=mysqli_fetch_array($res);
        echo "
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <img class=\"img-rounded\" alt=\"Bootstrap Image Preview\" src= /img/news_img/$row[picture]>
                </div>
                <div class=\"col-md-8\">
                    <p>$row[date_time]</p>
                    <h2>$row[title]</h2>
                    <p>$row[content]</p>
                </div>
            </div>
        </div>";
    }
}

require_once ("footer.php");