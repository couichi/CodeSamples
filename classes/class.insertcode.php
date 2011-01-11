<?php

include_once "classes/class.dbconfig.php";

class InsertCode extends DbConfig
{
	
	
	public function insert($params)
	{
		$sql = "call insert_code(?,?,?,?,?)";
	/*	
		CREATE PROCEDURE insert_code(
		IN thecode TEXT,
		IN descrip TEXT,
		IN clines tinyint,
		IN langid INT UNSIGNED,
		IN cmdate VARCHAR(20)
		)
		
		BEGIN
		DECLARE codeid INT UNSIGNED;
		INSERT INTO codes(code,description,linenum,lang_id,created,modified) values(thecode,descrip,clines,langid,cmdate,cmdate);
		SET codeid := LAST_INSERT_ID();
		SELECT codeid;
		END //
			
			
		select sp_id from specialities where speciality = '';
		insert into code_specs(code_id,sp_id) values();
		

		*/
		$params['code'] = htmlentities($params['code'],ENT_QUOTES);
		if($params['description'] == "description of the above code")
		{
			$params['description'] = "";
		}
		else
		{
			$params['description'] = htmlentities($params['description'],ENT_QUOTES);
		}
		
		//insert code
		try{
		$sth = $this->pdo->prepare($sql);
		$sth->bindParam(1,$params['code']);
		$sth->bindParam(2,$params['description']);
		$sth->bindParam(3,$params['lines']);
		$sth->bindParam(4,$params['lang']);
		$sth->bindParam(5,$params['date']);
		$res = $sth->execute();
		//$all = $sth->fetchAll();
		//$sth->closeCursor();
		}
		catch(PDOException $e)
		{
			echo "" . $e->getMessage();
			echo "" . $e->getCode();
		}
		
		if($res)
		{
			$codeid = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
			$sth->closeCursor();
			//echo $codeid;
			return $codeid[0];

		}
		else
		{
			//echo -1;
			return -1;
		}
	}
}