<?php

namespace App\Mappers;

use \PDO;

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

	public function getNbAnswer()
	{
		$query = $this->db->query("SELECT COUNT(*) as `n` FROM `$this->tbl_name` WHERE !ISNULL(`datetime`) AND `admin`='0'");
		$data  = $query->fetch(PDO::FETCH_ASSOC);

		return $data['n'];
	}

	public function getNbNotAnswer()
	{
		$query = $this->db->query("SELECT COUNT(*) as `n` FROM `$this->tbl_name` WHERE ISNULL(`datetime`) AND `admin`='0'");
		$data  = $query->fetch(PDO::FETCH_ASSOC);

		return $data['n'];
	}
}