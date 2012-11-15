<?php

namespace App\Models;

class User
{
	private $id;
	private $login;
	private $datetime;
	private $admin; //bool

	public function __construct($login, $admin = false, $datetime = null)
	{
		$this->login    = $login;
		$this->admin    = $admin;
		$this->datetime = $datetime;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getLogin()
	{
		return $this->login;
	}

	public function setLogin($login)
	{
		$this->login = $login;
	}

	public function getDatetime()
	{
		return $this->datetime;
	}

	public function setDatetime($datetime)
	{
		$this->datetime = $datetime;
	}

	public function setAdmin($admin)
	{
		$this->admin = $admin;
	}

	public function isAdmin()
	{
		return $this->admin;
	}
}