<?php

namespace App\Controllers;

use App\Models\User;
use App\Mappers\UserMapper;

use App\Models\Reponse;
use App\Mappers\ReponseMapper;

use App\Models\Question;
use App\Mappers\QuestionMapper;

use \DateTime;

class QuestionnaireController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->controller = "questionnaire";
		$userMapper = new UserMapper;
		$login = $_SESSION['login'];
		$user = $userMapper->findByLogin($login);
		$this->vars['user'] = $user;
	}

	public function indexAction()
	{
		$userMapper = new UserMapper;
		$user       = $userMapper->findByLogin($_SESSION['login']);
		
		$reponseMapper = new ReponseMapper;
		$reponses      = $reponseMapper->findAllByUser($user);

		for ($i = 0 ; $i <= 6 ; ++$i)
			$this->vars['reponses'][$i] = "";		
		foreach ($reponses as $reponse)
		{
			$numero  = $reponse->getQuestion()->getNumero();
			$content = utf8_decode($reponse->getContent());
			$this->vars['reponses'][$numero] = $content;
		}

		$this->render("index", $this->vars);
	}

	public function traitementAction()
	{
		if (!$_POST)
			$this->redirect($this->generateUrl("questionnaire"));

		$userMapper = new UserMapper;
		$user       = $userMapper->findByLogin($_SESSION['login']);

		$questionMapper = new QuestionMapper;
		$reponseMapper  = new ReponseMapper;

		$reponseMapper->deleteByUser($user);

		for ($i = 1 ; $i <= 6 ; ++$i)
		{
			$reponse = new Reponse;
			$reponse->setQuestion($questionMapper->findByNumero($i));
			$reponse->setUser($user);
			$content = utf8_encode(htmlspecialchars($_POST['question' . $i]));
			if ($i == 1 && $content != "oui" && $content != "non")
				return;
			else if ($i == 3 && !($content >= 0 && $content <= 10))
				return;
			else if ($i != 2 && $i != 6 && $content != 0 && empty($content))
				return;
			$reponse->setContent($content);
			$reponseMapper->save($reponse);
			$user->setDatetime(new DateTime);
			$userMapper->save($user);
		}
		$this->redirect($this->generateUrl("questionnaire", "confirmation"));
	}

	public function confirmationAction()
	{
		$this->render("confirmation");
	}
}