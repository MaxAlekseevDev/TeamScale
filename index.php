<?php
error_reporting(0);


$controller = $_GET['controller'] ? ucfirst($_GET['controller']) : 'Index';

$controllerName = $controller . "Controller";

require_once "controllers/{$controllerName}.php";

$controller = new $controllerName();

$controller->renderPage("main");



?>