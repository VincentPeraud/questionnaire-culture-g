<?php

namespace App\Mappers;

use App\Utils\Db;

abstract class Mapper
{
	protected $db;
	protected $tbl_name;
	protected $modelClass;
	private   $column_names;

	public function __construct()
	{
		$this->db           = Db::getInstance();
		$this->column_names = $this->db->getColumnNames($this->tbl_name);
	}

	public function save($modelObject)
	{
		$id   = $modelObject->getId();
		$cols = $this->column_names;

		if ($id)
		{
			$query = "UPDATE `" . $this->tbl_name . "` SET ";
			for ($i = 0 ; $i < sizeof($cols) ; ++$i)
			{
				$query .= "`" . $cols[$i] . "`=:" . $cols[$i];
				if ($i != sizeof($cols) - 1)
					$query .= ",";
				$query .= " ";
			}
			$query .= "WHERE `id`=:id";
		}
		else
		{
			$query = "INSERT INTO `" . $this->tbl_name . "` VALUES(";
			for ($i = 0 ; $i < sizeof($cols) ; ++$i)
			{
				$query .= ":" . $cols[$i];
				if ($i != sizeof($cols) - 1)
					$query .= ", ";
			}
			$query .= ")";
		}

		$this->db->prepare($query);

		$params = array();
		foreach ($cols as $col)
		{
			$attr = str_replace("_", " ", $col);
			$attr = ucwords($attr);
			$attr = str_replace(" ", "", $attr);
			$getter = "get" . $attr;
			$params[":" . $col] = $modelObject->$getter();
		}

		$this->db->execute($params);

		if (!$id)
			$modelObject->setId($this->db->lastInsertId());

		return $modelObject;
	}

	public function find($id)
	{
		$this->db->prepare("SELECT * FROM `$this->tbl_name` WHERE `id`=?");
		$this->db->execute(array($id));
		return $this->db->fetch($this->modelClass);
	}

	public function fetchAll()
	{
		$this->db->query("SELECT * FROM `$this->tbl_name`");
		return $this->db->fetchAll($this->modelClass);
	}

	public function delete($modelObject)
	{
		$id = $modelObject->getId();
		$this->db->prepare("DELETE FROM `$this->tbl_name` WHERE `id`=?");
		$this->db->execute(array($id));
	}
}