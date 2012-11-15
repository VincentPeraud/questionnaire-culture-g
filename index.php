<?php

spl_autoload_register();

$controller_namespace = "App\Controllers\\";

$controller = "questionnaireController";
$action = "indexAction";

if (isset($_GET['controller']))
	$controller = ucfirst($_GET['controller']) . "Controller";

if (isset($_GET['action']))
	$action = $_GET['action'] . "Action";

$controller = $controller_namespace . $controller;

$c = new $controller();
$c->$action();