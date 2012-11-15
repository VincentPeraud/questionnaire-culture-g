<?php

namespace App\Controllers;

use \ReflectionClass;

class Controller
{
	private $view_path   = "app/views/";
	private $layout_name = "layout.php";
	private $layout      = true;
	private $base_url    = "http://localhost:8888/questionnaire-culture-generale/";	
	protected $title     = "Questionnaire Cours de Culture Générale";

	public function render($view)
	{
		$r         = new ReflectionClass($this);
		$classname = $r->getName();
		$classname = str_replace($r->getNamespaceName() . "\\", '', $classname);
		$classname = preg_replace('#Controller$#', '', $classname);

		$contentView = $this->view_path . strtolower($classname) . "/" . $view . "View.php"; 
		if ($this->layout)
			require_once($this->view_path . "layout.php");
		else
			require_once($contentView);
	}

	public function generateUrl($controller, $action = null)
	{
		$url = "index.php?controller=" . $controller . "&action=" . $action;
		$url = "$controller/$action";
		return $url;	
	}

	public function redirect($controller, $action = null)
	{
		$url = $this->generateUrl($controller, $action);
		header('Location: ' . $url);
	}

	public function disableLayout()
	{
		$this->layout = false;
	}
}