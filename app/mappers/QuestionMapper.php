<?php

namespace App\Mappers;

class QuestionMapper extends Mapper
{
	protected $tbl_name   = "question";
	protected $modelClass = "App\Models\Question";	

	public function findByNumero($numero)
	{
		$this->db->prepare("SELECT * FROM `$this->tbl_name` WHERE `numero`=?");
		$this->db->execute(array($numero));
		return $this->db->fetch($this->modelClass);
	}
}