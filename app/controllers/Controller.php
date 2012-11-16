<?php

namespace App\Controllers;

use \ReflectionClass;
use App\Utils\Conf;

class Controller
{
	private $view_path;
	private $layout_name;
	private $layout;
	private $base_url;
	
	protected $controller;
	protected $title;

	public function __construct()
	{
		$this->base_url    = Conf::BASE_URL;
		$this->title       = Conf::DEFAULT_TITLE;
		$this->view_path   = Conf::VIEW_PATH;
		$this->layout_name = Conf::LAYOUT_NAME;
		$this->layout      = true;

		session_start();
		if (!isset($_SESSION['login']) && $this->controller != "login")
			$this->redirect($this->generateUrl("login"));
	}

	public function render($view, $vars = array())
	{
		$class     = new ReflectionClass($this);
		$classname = $class->getName();
		$classname = str_replace($class->getNamespaceName() . "\\", '', $classname);
		$classname = preg_replace('#Controller$#', '', $classname);

		$contentView = $this->view_path . strtolower($classname) . "/" . $view . "View.php";

		foreach ($vars as $key => $value)
			$$key = $value;

		if ($this->layout)
			require_once($this->view_path . "layout.php");
		else
			require_once($contentView);
	}

	public function generateUrl($controller, $action = null)
	{
		$url = "$controller";
		if ($action)
			$url .= "/$action";
		return $url;	
	}

	public function redirect($controller, $action = null)
	{
		$url = $this->generateUrl($controller, $action);
		header('Location: ' . $this->base_url . $url);
		exit;
	}

	public function disableLayout()
	{
		$this->layout = false;
	}
}