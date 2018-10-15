<?php

namespace Model;

use \Core\Entity;
use \Core\ORM;



class UserModel extends Entity
{
	public $table = 'users';
	// private $email;
	// private $password;

	// public function __construct()
	// {
	// 	$this->database = new Database();
	// 	$this->database = $this->database->connect();
	// }

	// public function create($email,$password)
	// {

	// 	$stmt = $this->database->prepare("INSERT INTO `users` (`id`, `email`, `password`) VALUES (NULL, '".$email."', '".$password."')");
	// 	$stmt->execute();
	// }

	// 	public function read($table,$id)
	// {

	// 	$stmt = $this->database->prepare("SELECT * from $table where id = $id");
	// 	$stmt->execute();
	// }

	// public function update($id,$colonne)
	// {
	// 			$stmt = $this->database->prepare("UPDATE users set $colonne where id = $id");
	// 	$stmt->execute();
	// }

	// public function delete($id,$table)
	// {
	// 	$stmt = $this->database->prepare("DELETE from $table where id = $id");
	// 	$stmt->execute();
	// }
	// public function read_all($table)
	// {
	// 	$stmt = $this->database->prepare("SELECT * from $table");
	// 	$stmt->execute();
	// }

	public function CheckEmail()
	{
		$find = $this->orm->find($this->table, $params = array(
    		'WHERE' => "email = '" . $this->email ."'"));
		if (!empty($find)) {
			return true;
		}
		else {
			return false;
		}
	}

	public function Checklogin()
	{
		$find = $this->orm->find($this->table, $params = array(
    		'WHERE' => "email = '" . $this->email . " AND password = '" . $this->password ."'"))	;
		if (!empty($find)) {
			return true;
		}

		else {
			return false;
		}
	}


}
