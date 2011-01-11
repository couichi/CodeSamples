<?php

class DbConfig
{
	protected $host = "localhost";
	protected $user = "root";
	protected $password = "";
	protected $dbname = "codesamples";
	protected $pdo;
	protected $res;
	
	function __construct()
	{
		$host=$this->host;
		$user=$this->user;
		$password=$this->password;
		$dbname=$this->dbname;
		
		try {
			$this->pdo = new PDO("mysql:host=$host; dbname=$dbname",$user, $password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$this->pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
			$this->pdo->SetAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
			
			return $this;
			
		} catch (PDOException $e){
			var_dump($e->getMessage());
		}
	}
	
	public function squery($sql)
	{
		$res = $this->pdo->query($sql);
		$this->pdo->closeCursor();
		return $res;
	}
	
	public function display($cols)
	{
		
		foreach($this->res as $row)
		{
			foreach($cols as $var)
			{
				echo $row[$var]." ";
			}
		}
	}
}