<?php

namespace App\Controllers;

use App\Controllers\Controller;

use \ReflectionClass;

class QuestionnaireController extends Controller
{
	public function indexAction()
	{
		$this->render("index");
	}

	public function traitementAction()
	{
		echo "traitement";
	}

	public function confirmationAction()
	{
		echo "confirmation";
	}
}