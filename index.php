<?php

use Application\Core\Route;

spl_autoload_register();

require_once 'routes.php';
/*
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE myDB";*/

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$segments = explode('/', trim($uri, '/'));



(new Route)->routeProcessing(ROUTES, $segments);


/*$method = $_SERVER['REQUEST_METHOD'];


$file = 'Application/pages/' . $segments[0] . '.php';

if(file_exists($file))
    require $file;
else
    require 'Application/pages/404.php';
*/
