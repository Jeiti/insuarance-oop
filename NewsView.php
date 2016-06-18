<?php

class NewsView
{
    function showLayout($data=[]){
        $this->showHeader();
        $this->showContent($data);
        $this->showFooter();
    }

    private function showHeader(){
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
    private function showFooter(){
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
    private function showContent($data){
        print_r($data);
    }
}

//TODO: доделать верстку вывода новости