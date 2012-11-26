<?php

namespace App\Controllers;

use App\Mappers\ReponseMapper;
use App\Mappers\UserMapper;

class ResultsController extends Controller
{
	protected $vars;

	public function __construct()
	{
		parent::__construct();
		$this->vars = array();
		$login = $_SESSION['login'];
		$userMapper = new UserMapper;
		$user = $userMapper->findByLogin($login);
		if (!$user->isAdmin())
			$this->redirect($this->generateUrl("questionnaire"));
	}

	public function indexAction()
	{
		$reponseMapper = new ReponseMapper;

		$this->vars['reponses'] = $reponseMapper->fetchAll();

		$this->render("index", $this->vars);
	}
}