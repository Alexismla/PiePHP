<?php 
 
 namespace Core;
 use \PDO;

 
class Database 
{

	public $dbhost = 'localhost';
	public $dbname = 'users';
	public $dbuser = 'root';
	public $dbpass = '';

public function connect()

{
		$dbcon = new PDO("mysql:host={$this->dbhost};dbname={$this->dbname}",$this->dbuser,$this->dbpass);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->pdo = $dbcon;
		return $this->pdo;
		// var_dump($dbcon);
}

}