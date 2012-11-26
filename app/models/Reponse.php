<?php

namespace App\Models;

use App\Models\Question;
use App\Models\User;

class Reponse extends Model
{
	protected $id;
	protected $question;
	protected $user;
	protected $content;

	public function init($user, $question, $content)
	{
		$this->user     = $user;
		$this->question = $question;
		$this->content  = $content;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getQuestion()
	{
		return $this->question;
	}

	public function setQuestion(Question $question)
	{
		$this->question = $question;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function setUser(User $user)
	{
		$this->user = $user;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function __toString()
	{
		return nl2br(utf8_decode($this->content));
	}
}