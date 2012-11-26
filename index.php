<?php

spl_autoload_register('autoload');

$controller_namespace = "App\Controllers\\";

$controller = "ResultsController";
$action = "indexAction";

if (isset($_GET['controller']))
	$controller = ucfirst($_GET['controller']) . "Controller";

if (isset($_GET['action']))
	$action = $_GET['action'] . "Action";

$controller = $controller_namespace . $controller;

$c = new $controller();
$c->$action();

//--------------------------------------------------------------

function autoload($class)
{
	$class = explode("\\", $class);
	$path = "";
	for ($i = 0 ; $i < sizeof($class) ; ++$i)
	{
		if ($i != sizeof($class) - 1)
			$path .= strtolower($class[$i]) . "/";
		else
			$path .= $class[$i] . ".php";
	}
	require_once($path);
}