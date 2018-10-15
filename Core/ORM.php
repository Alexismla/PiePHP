<?php

namespace Core;

use \Core\Database;

class ORM 
{

	public function __construct()
	{
		$this->database = new Database();
		$this->database = $this->database->connect();
	}

	public function create($table, $fields) {

    	$keys = implode(",", array_keys($fields)); //array_keys : Retourne toutes les clés ou un ensemble des clés d'un tableau
    	$values = implode("','", $fields); //implode : Rassemble les éléments d'un tableau en une chaîne
    	$stmt = $this->database->prepare("INSERT INTO $table ($keys) VALUES ('$values')");
    	$stmt->execute();
    	var_dump($stmt);	
    	return $this->database->lastInsertId();
    }

    public function read($table, $id)
    {
    	$stmt->database->query("SELECT * FROM $table WHERE id = $id");
    	return $stmt->fetch();
    }     

    public function update($table, $id, $fields)
    {
  //   	$keys = implode(",", array_keys($fields));
  //   	$values = implode("','", $fields);

  //   	$stmt = $this->database->prepare("UPDATE $table set $keys = '$values' where id = $id");
		// $stmt->execute();
		// return true;

		$strfields = "";
		unset($fields['id']);
		foreach ($fields as $key => $value) {
			$strfields .= $key . " = \"" . $value . "\",";
		}
		$str_fields = substr($strfields, 0, -1);
		$this->query("UPDATE $table SET $str_fields WHERE id = $id");
		return $this->execute();
    }   

    	public function delete($id,$table)
    	{
    		$stmt = $this->database->prepare("DELETE from $table where id = $id");
    		$stmt->execute();
    		return true;

    	}

    	public function find($table, $params = array(
    		'WHERE' => '',
    		'ORDER BY' => '',
    		'LIMIT' => ''))
    	{
    		if (isset($params)) {
    			$string_params = '';
    			foreach ($params as $key => $value) {
    				if (!empty($value)) {
    					$string_params .= $key . ' ' . $value . ' ';
    				}
    			}
    			$this->database->query("SELECT * FROM $table $string_params");
    			return $this->fetch_all();
    		}
    	}
}