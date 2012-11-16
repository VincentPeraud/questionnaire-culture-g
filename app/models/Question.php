<?php

namespace App\Models;

class Question extends Model
{
	private $id;
	private $numero;
	private $intitule;

	public function init($numero, $intitule)
	{
		$this->numero   = $numero;
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

	public function getNumero()
	{
		return $this->numero;
	}

	public function setNumero($numero)
	{
		$this->numero = $numero;
	}
}