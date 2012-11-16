<?php

namespace App\Controllers;

use App\Utils\IonisUser;
use App\Mappers\UserMapper;

class LoginController extends Controller
{
	private $vars;

	public function __construct()
	{
		$this->controller = "login";

		parent::__construct();

		$this->vars       = array();
	}
	public function indexAction()
	{
		$this->vars['auth_failed'] = false;

		if (isset($_POST['login']) && isset($_POST['password']))
		{
			$login      = $_POST['login'];
			$pwd        = $_POST['password'];
			$userMapper = new UserMapper;
			
			if (IonisUser::checkAuth($login, $pwd) && $userMapper->findByLogin($login))
			{
				$_SESSION['login'] = $login;
				$this->redirect($this->generateUrl("questionnaire"));
			}
			else
				$this->vars['auth_failed'] = true;
		}

		$this->render("index", $this->vars);
	}

	public function logoutAction()
	{
		$_SESSION = array();
		session_destroy();
		$this->redirect($this->generateUrl("login"));
	}
}