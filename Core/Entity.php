<?php

namespace Core;

use \Core\ORM;


class Entity
{
	public $table;

    public function __construct($table = 'users')
    {
        $this->orm = new ORM();
        $this->table = $table;
    }

    public function create()
	{
		return $this->orm->create($this->table, $_POST);
	}
	public function read()
	{
		return $this->orm->read($this->table, $this->id);
	}
	public function update()
	{
		return $this->orm->update($this->table, $this->id, $this->fields);
	}
	public function delete()
	{
		return $this->orm->delete($this->table, $this->id);
	}

	public function find()
	{
		return $this->orm->find($this->table);
	}
}
