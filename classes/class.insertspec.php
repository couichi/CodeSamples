<?php

include_once "class.dbconfig.php";

class InsertSpec extends DbConfig
{
//takes lang_id
//lastInsertId
	protected $sth;
	
	public function insertSpecs($spec,$lang_id)
	{
		$sql = "call insert_specs(?,?)";
		/*
		CREATE PROCEDURE insert_specs(
		IN spec VARCHAR(64),
		IN langid INT UNSIGNED
		)
		
		BEGIN
		
		DECLARE spid INT;

		DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
		BEGIN
		ROLLBACK;
		SELECT -1;
		END;

		START TRANSACTION;
		INSERT into specialities(speciality) values(spec);
		SET spid = LAST_INSERT_ID();
		insert into lang_specs(lang_id,sp_id) values(langid,spid);
		COMMIT;
		END //
			
		*/
		$sth = $this->pdo->prepare($sql);
		$sth->bindParam(1,$spec);
		$sth->bindParam(2,$lang_id);
		$res = $sth->execute();
		$sth->closeCursor();
		
		if($res)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}

/*
$db = new InsertSpec();
//$sql="select * from langs";

$flg = $db->insertSpecs('PostgreSQL',46);

if($flg)
{
	echo "success";
}

//$db = new DbConfig();
//$db->squery($sql)->display();
*/


