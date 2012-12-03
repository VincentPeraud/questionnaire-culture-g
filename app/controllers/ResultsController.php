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
		$this->vars['user'] = $user;
		if (!$user->isAdmin())
			$this->redirect($this->generateUrl("questionnaire"));
	}

	public function indexAction()
	{
		$reponseMapper = new ReponseMapper;
		$userMapper    = new UserMapper;
		$reponses      = $reponseMapper->fetchAll();

		$q1["oui"] = 0;
		$q1["non"] = 0;
		for ($i = 0 ; $i <= 10 ; ++$i)
			$note[$i] = 0;
		$moy = 0;
		$sum = 0;
		foreach ($reponses as $reponse)
		{
			if ($reponse->getQuestion()->getNumero() == 1)
			{
				$q1[$reponse->getContent()]++;
			}
			if ($reponse->getQuestion()->getNumero() == 3)
			{
				$note[$reponse->getContent()]++;
				$moy += $reponse->getContent();
				++$sum;
			}
		}
		$moy /= $sum;
		$moy = round($moy, 2);

		$this->vars['reponses']      = $reponses;
		$this->vars['moy']           = $moy;
		$this->vars['note']          = $note;
		$this->vars['q1']            = $q1;
		$this->vars['answer']        = $userMapper->getNbAnswer();
		$this->vars['total']         = $userMapper->getNbNotAnswer() + $this->vars['answer'];
		$this->vars['participation'] = round($this->vars['answer'] / $this->vars['total'] * 100, 2);
		$this->render("index", $this->vars);
	}
}