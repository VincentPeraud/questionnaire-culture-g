<?php

namespace App\Models;

use \Exception;
use \ReflectionClass;

abstract class Model
{
	public function __call($method, $args)
	{
		$type = substr($method, 0, 3);
		$attr = substr($method, 3);
		if ($type == "get")
			return $this->my_get($attr);
		else if ($type == "set")
			$this->my_set($attr, $args[0]);
		else
		{
			$class = new ReflectionClass($this);
			throw new Exception("Undefined method $method. for class " . $class->getName());
		}
	}

	public function my_get($property)
	{
		if (substr($property, 0, 2) != "Id")
			return NULL;

		$getter = "get" . substr($property, 2);
		return $this->$getter()->getId();
	}

	public function my_set($property, $value)
	{
		if (substr($property, 0, 2) != "Id")
			return NULL;

		$setter = "set" . substr($property, 2);
		$mapper = "App\Mappers\\" . substr($property, 2) . "Mapper";
		$class  = new $mapper;
		$this->$setter($class->find($value));
	}
}