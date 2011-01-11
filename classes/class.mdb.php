<?php
	

class Mdb
{
	
	protected $host = "localhost";
	protected $user = "root";
	protected $password = "";
	protected $dbname = "codesamples";
	protected $con;
	
	public function connect($dbname)
	{
		$this->con = mysql_connect("localhost","root","",0,131072);
		
		mysql_select_db($dbname,$this->con);
	}
	
	public function disconnect()
	{
		mysql_close($this->con);
	}
}