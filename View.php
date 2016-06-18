<?php

class View{
    function showLayout($data=[]){
        $this->showHeader();
        $this->showContent($data);
        $this->showFooter();
    }

    function showHeader(){
        echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Insuarance-oz</title>
    <meta name="author" content="Insuarance-oz">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container">
    <!--Navbar-->


    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default navbar-inverse" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" id="ontop">Insuarance-oz</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Products</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

<!--                        <?php if(!isset($_SESSION["user"])):?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login/Register<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="col-md-12 nav navbar-form">
                                            <form role="form" action="authorize.php" method="post">
                                                <div class="enlarge_interval">
                                                    <input type="text" class="form-control" placeholder="e-mail" name="username">
                                                </div>
                                                <div class="enlarge_interval">
                                                    <input type="password" class="form-control" placeholder="password" name="password">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 column ui-sortable">
                                                        <a href="register.php" class="btn btn-success" type="button">Register</a>
                                                        <button type="submit" class="btn btn-success" name="auth"><span class="glyphicon glyphicon-log-in"></span> Sign in</button>
                                                    </div>
                                                </div>
                                                <div>
                                                    <input class="navbarckeckbox" id="navbarcheckbox" type="checkbox" name="remember">
                                                    <label class="navbarckeckboxlabel" for="navbarcheckbox"> Remember me</label>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        <?php else:?>-->
                            <div class="row">
                                <div class="col-md-12 column ui-sortable">
                                    <li class="navbar-text"><!--<?php print_r($_SESSION["user"]);?>-->
                                        <a href="logout.php" class="btn btn-success navbar-btn" type="button">Выход</a>
                                    </li>
                                </div>
                            </div>
<!--                        <?php endif;?>-->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
';
    }
    function showFooter(){
        echo '
        <footer>
        <hr>
        <p class="muted pull-left">Insuarance-oz &copy; 2016</p>
        </footer>
        <a type="button" class="btn btn-sm btn-primary ontop" for="ontop" href="#">
            Наверх
        </a>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
        
        </body>
        </html>';
    }
    function showContent($data=[]){
        echo '<div class="row">
    <div class="col-sm-8">
        <div class="jumbotron" contenteditable="true">
            <h2>Hello, world!</h2>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-large" href="#">Learn more</a></p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="row">
            <div class="media">
                <a href="#" class="pull-left">
                    <img alt="Bootstrap Media Preview" src="http://lorempixel.com/64/64/" class="media-object">
                </a>
                <div class="media-body" contenteditable="true">
                    <h4 class="media-heading">Nested media heading</h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="media">
                <a href="#" class="pull-left">
                    <img alt="Bootstrap Media Preview" src="http://lorempixel.com/64/64/" class="media-object">
                </a>
                <div class="media-body" contenteditable="true">
                    <h4 class="media-heading">Nested media heading</h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="media">
                <a href="#" class="pull-left">
                    <img alt="Bootstrap Media Preview" src="http://lorempixel.com/64/64/" class="media-object">
                </a>
                <div class="media-body" contenteditable="true">
                    <h4 class="media-heading">Nested media heading</h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </div>
            </div>
        </div>
    </div>
</div>
<!---------------==================================================================================================================----------------------------------------->
<hr>
<!---------------==================================================================================================================----------------------------------------->
';
        $this->showNews($data);
    }
    private function showNews($data=[]){
        $i=0;
        foreach($data as $news){
            if ($i % 3)
                echo "<div class=\"row\">";
                    echo "<div class=\"col-md-4\">
                    <div class=\"thumbnail\">
                        <img class=\"img-rounded\" src=\"img/news_img/$news[picture]\">
                        <h3>$news[title]</h3>
                        <p>$news[content]</p>
                        <p><a class=\"btn btn-primary\" href=\"/page_news.php?new=$news[id]\">Подробнее</a></p>
                    </div>
                </div>";
                if(($i % 3) == 2)
                echo "</div>";
            $i++;
        }
    }
}