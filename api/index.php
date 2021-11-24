<?php

header('Content-Type: application/json; charset=utf-8');

error_reporting(E_ALL);
ini_set('display_errors', 'on');

define('ROOT', __DIR__);

require_once 'vendor/autoload.php';
require_once  ROOT . '/api/config/const.php';
$routes = require_once ROUTES;

function dd($arr) {
  echo '<pre>';
  print_r($arr);
  echo '</pre>';
}

use Core\App;

$app = new App($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $routes);
$app->run();
