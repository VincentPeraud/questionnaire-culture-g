<?php

namespace App\Utils;

use \PDO;
use \ReflectionClass;

class Db
{
	private static $instance;
	private $pdo;
	private $prepared_query;
	private $query;

	private function __construct()
	{
		$db_host   = Conf::DB_HOST;
		$db_login  = Conf::DB_LOGIN;
		$db_pwd    = Conf::DB_PWD;
		$db_name   = Conf::DB_NAME;
		$dsn       = "mysql:dbname=$db_name;host=$db_host";
		$this->pdo = new PDO($dsn, $db_login, $db_pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	}

	public static function getInstance()
	{
		if (!self::$instance)
			self::$instance = new self;
		return self::$instance;
	}

	public function query($query)
	{
		$this->query          = $this->pdo->query($query);
		$this->prepared_query = NULL;
	}

	public function prepare($query)
	{
		$this->prepared_query = $this->pdo->prepare($query);
		$this->query = NULL;
	}

	public function execute($params = null)
	{
		if ($this->prepared_query)
			$this->prepared_query->execute($params);
	}

	public function fetch($classname)
	{
		if ($this->prepared_query)
			$query = $this->prepared_query;
		else
			$query = $this->query;
		$query->setFetchMode(PDO::FETCH_OBJ);
		return $this->createModelObject($query->fetch(), $classname);
	}

	public function fetchAll($classname)
	{
		if ($this->prepared_query)
			$query = $this->prepared_query;
		else
			$query = $this->query;

		$fetch = $query->fetchAll(PDO::FETCH_OBJ);
		$modelObjects = array();
		foreach ($fetch as $fetchObject)
			$modelObjects[] = $this->createModelObject($fetchObject, $classname);
		return $modelObjects;
	}

	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}

	public function getColumnNames($tbl_name)
	{
		$names = array();
		$query = $this->pdo->query("describe $tbl_name");
		$rows = $query->fetchAll(PDO::FETCH_OBJ);
		foreach ($rows as $row)
			$names[] = $row->Field;
		return $names;
	}

	private function createModelObject($pdo_result, $classname)
	{
		$modelObject = new $classname;
		$properties = get_object_vars($pdo_result);
		foreach ($properties as $attr => $value)
		{
			$attr = str_replace("_", " ", $attr);
			$attr = ucwords($attr);
			$attr = str_replace(" ", "", $attr);
			$setter = "set" . $attr;
			$modelObject->$setter($value);
		}
		return $modelObject;
	}

}