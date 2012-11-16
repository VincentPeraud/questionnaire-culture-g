<?php

namespace App\Mappers;

class UserMapper extends Mapper
{
	protected $tbl_name   = "user";
	protected $modelClass = "App\Models\User";

	public function findByLogin($login)
	{
		$this->db->prepare("SELECT * FROM `$this->tbl_name` WHERE `login`=?");
		$this->db->execute(array($login));
		return $this->db->fetch($this->modelClass);
	}
}