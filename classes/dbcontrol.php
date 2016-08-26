<?php

class connect{
	private $connection;
	private $hostName;
	private $userName;
	private $password;
	private $dbName;

	public function __construct(){
		$this->hostName = "localhost";
		$this->userName = "himanshu";
		$this->password = "";
		$this->dbName = "himanshu";
	}

	public function startConnection(){
		$this->connection = mysqli_connect($this->hostName,$this->userName,$this->password);

		$checkdb = "create database if not exists ".$this->dbName;
		$this->connection->query($checkdb);
		mysqli_select_db($this->connection , $this->dbName);

		//echo "<h3>Database connected</h3>";
	}

	public function stopConnection(){
		
		if (isset($this->connection)) {
			$this->connection->close();
		}
	}

	public function executeQuery($query){

		$this->startConnection();
		$result = $this->connection->query($query);
		$this->stopConnection();
		return $result;
	}
}


?>