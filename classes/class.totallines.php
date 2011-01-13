<?php
	
	
include "classes/class.PdoConnect.php";

class TotalLines extends PdoConnect
{
	
	
	public function getTotalLines()
	{
		$sql = "select sum(linenum) from codes";
		$sth = $this->pdo->prepare($sql);
		$sth->execute();
		$res = $sth->fetchAll();
		
		//print_r($res);
		foreach($res as $row)
		{
			echo "Total Lines of Codes($row[0])";
		}
	}
	

}