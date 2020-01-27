<?php
error_reporting(E_ALL);


//connect files
define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Autoload.php');
session_start();

$router = new Router();
$router->run();

