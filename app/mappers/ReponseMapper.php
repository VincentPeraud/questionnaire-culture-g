<?php

namespace App\Mappers;

use App\Models\User;

class ReponseMapper extends Mapper
{
	protected $tbl_name   = "reponse";
	protected $modelClass = "App\Models\Reponse";

	public function findAllByUser(User $user)
	{
		$this->db->prepare("SELECT * FROM `$this->tbl_name` WHERE `id_user`=?");
		$this->db->execute(array($user->getId()));
		return $this->db->fetchAll($this->modelClass);
	}

	public function deleteByUser(User $user)
	{
		$this->db->prepare("DELETE FROM `$this->tbl_name` WHERE `id_user`=?");
		$this->db->execute(array($user->getId()));
	}
}