<?php

namespace App\Model;

class Question
{
	private $id;
	private $intitule;

	public function __construct($intitule)
	{
		$this->intitule = $intitule;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getIntitule()
	{
		return $this->intitule;
	}

	public function setIntitule($intitule)
	{
		$this->intitule = $intitule;
	}
}