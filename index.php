<?php
use framework\FrontController;
header("Content-type:text/html; charset=utf-8");
require_once ("config.inc");

echo "index";
FrontController::start();