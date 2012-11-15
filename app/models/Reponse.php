<?php

namespace App\Model;

use App\Model\Question;
use App\Model\Student;

class Reponse
{
	private $id;
	private $question;
	private $student;
	private $content;

	public function __construct($student, $question, $content)
	{
		$this->student  = $student;
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

	public function getStudent()
	{
		return $this->student;
	}

	public function setStudent(Student $student)
	{
		$this->student = $student;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}
}