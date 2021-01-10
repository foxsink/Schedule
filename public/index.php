<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

use vendor\core\Router;

require_once '../vendor/libs/functions.php';

$query = trim($_SERVER['REQUEST_URI'],'/');

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . "/vendor/core");
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . "/app");
define('LAYOUT', 'default');

spl_autoload_register(function ($class)
{
    $file = ROOT . '/' . str_replace('\\','/', $class) . ".php";
    if(is_file($file))
    {
        require_once $file;
    }
});



$router = new Router();


Router::add('^table/(?P<action>[a-z-0-9]+)/(?P<alias>[a-z-0-9]+)$', ['controller' => 'table']);
//Router::add('^page/(?P<alias>[a-z-0-9]+)$', ['controller' => 'page', 'action' => 'index']);


Router::add('^$', ['controller' => 'main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-0-9]+)/?(?P<action>[a-z-0-9]+)?$');

Router::dispatch($query);