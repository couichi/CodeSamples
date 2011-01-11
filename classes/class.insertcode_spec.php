<?php
	
include_once "classes/class.dbconfig.php";

class InsertCode_Spec extends DbConfig
{
	protected $tags;
	protected $langid;
	protected $codeid;
	protected $insertspec;
	protected $err = array();
	
	public function main($langid,$codeid,$tagcsv)
	{
		//echo "constructed";
		$this->langid = $langid;
		$this->codeid = $codeid;
		$this->explodeTags($tagcsv)->getTagid();
		$this->errorCheck();
	}
	
	public function explodeTags($tagcsv)
	{//store comma separated tags into an array tags
		$tagcsv = rtrim($tagcsv,",");
		$this->tags = explode(",",$tagcsv);
		//print_r($tags);
		return $this;
	}
	
	public function getTagid()
	{
		$sql = "select id from specialities where speciality = ?;";
			$sth = $this->pdo->prepare($sql);
			
		foreach($this->tags as $tag)
		{
			//echo $tag."<br>";
			$sth->bindParam(1,$tag);
			$res = $sth->execute();
			//var_dump($res);
			if($sth->rowCount())
			{
				//$tagid = $sth->fetchColumn(0);
				$tagid = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
				//var_dump($tagid);
				//insert code_spec
				$this->err[] = $this->insertCodeSpec($tagid[0]);
			}
			else
			{//there is no such tag in the database
			
				$tagid = $this->makeTag($tag);
				//var_dump($tagid);
				//insert lang_spec
				$lang_spec = $this->insertspec = new InsertSpec();
				$lang_spec->insertSpecs($tagid,$this->langid);
				//insert code_spec
				$this->err[] = $this->insertCodeSpec($tagid);
			}
			
		}
	}
	
	public function makeTag($tag)
	{
		$sql = "call insert_specs(?,?)";
		/*
		DELIMITER //
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
		SELECT spid;
		END //
		DELIMITER ;
		*/
		$sth = $this->pdo->prepare($sql);
		$sth->bindParam(1,$tag);
		$sth->bindParam(2,$this->langid);
		$sth->execute();
		//$tagid = $sth->fetchColumn(0);
		$tagid = $sth->fetchAll(PDO::FETCH_NUM);
		$sth->closeCursor();
		return $tagid[0];
	}
	
	public function insertCodeSpec($tagid)
	{
		
		$sql="insert into code_specs(code_id,sp_id) values(?,?)";
		
		try{
		$sth = $this->pdo->prepare($sql);
		$sth->bindParam(1,$this->codeid);
		$sth->bindParam(2,$tagid);
		$res = $sth->execute();
		$sth->closeCursor();
		/*
		$sql=sprintf("insert into code_specs(code_id,sp_id) values(%s,%s)",
		$this->codeid,
		$tagid);
		$sth = $this->pdo;
		$res = $sth->exec($sql);
		//$sth->closeCursor();
		*/}
		catch(PDOException $e)
		{
			echo "" . $e->getMessage();
			echo "" . $e->getCode();
		}
		return $res;
	}
	
	public function errorCheck()
	{
		$err = $this->err;
		$count = count($err);
		$sum = array_sum($err);
		if($count!=$sum)
		{
			echo "err";
		}
		else
		{
		$url="success.php";
		$param=array();
		$jump = new Jump($url,$param);
		}
	}
}