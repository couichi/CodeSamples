<?php
	
include "classes/class.dbconfig.php";

class SelectTags extends DbConfig
{
	public function display()
	{
		
		foreach($this->res as $row)
		{
			$array[]=$row['speciality'];
		}
		
		echo json_encode($array);
	}
}