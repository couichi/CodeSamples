<?php

class PdoCodesInsert extends PdoConnect
{
	
	protected $codeid;
	protected $langid;
	protected $err = array(0);
	protected $tags = array();
	
	public function main($params)
	{
		//insert code and get codeid
		//explode comma separated tags and store them into an array
		//check each tag if it is in the database
		//if it is get tagid
		//else insert tag and get the new tagid
		//insert lang_tag map
		//insert code_tag map
		
		$this->langid = $params['lang'];
		
		$this->codeInsert($params);
		$this->tagValidate($params['tag']);
		
		if(count($this->tags)==0)
		{
			
		}
		else
		{
		foreach($this->tags as $tag)
		{
			$this->tagCodeInsert($tag);
		}
		}
		
		
		if(array_sum($this->err)==0)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	
	public function codeInsert($params)
	{
		$params['code'] = htmlentities($params['code'],ENT_QUOTES);
		$codeid=Null;
		if($params['description'] == "description of the above code")
		{
			$params['description'] = "";
		}
		else
		{
			$params['description'] = htmlentities($params['description'],ENT_QUOTES);
		}
		
		$sql = "INSERT INTO codes(code,description,linenum,lang_id,created,modified) values(?,?,?,?,?,?)";
		
		//insert code
		try{
			$sth = $this->pdo->prepare($sql);
			$sth->bindParam(1,$params['code']);
			$sth->bindParam(2,$params['description']);
			$sth->bindParam(3,$params['lines']);
			$sth->bindParam(4,$params['lang']);
			$sth->bindParam(5,$params['date']);
			$sth->bindParam(6,$params['date']);
			$res = $sth->execute();
			//$all = $sth->fetchAll();
			//$sth->closeCursor();
		}
		catch(PDOException $e)
		{
			echo "" . $e->getMessage();
			echo "" . $e->getCode();
		}
		$codeid = $this->pdo->lastInsertId();
		//echo $codeid;
		$this->codeid = $codeid;
	}
	
	
	
	
	public function tagValidate($tagcsv)
	{
		$tagcsv = rtrim($tagcsv,",");
		$tags = explode(",",$tagcsv);
		foreach($tags as $tag)
		{
			if(strlen($tag)<2)
			{
				$minus[]=$tag;
			}
		}
		
		$tags = array_diff($tags,$minus);
		$this->tags = $tags;
	}
	
	public function tagCodeInsert($tag)
	{
		/*
			Check each tag if it exists in the database
			If it is, get the tag_id and goto 5.
			Else insert it into the tag table
			Get the last_insert_id for the tag
			Insert the lang_id and the tag_id into the lang_tag table
			Insert code_id and tag_id into code_tag table
		*/
		
		/*
		CREATE PROCEDURE tag_code_insert(
		IN tag VARCHAR(64),
		IN codeid INT UNSIGNED,
		IN langid INT UNSIGNED
		)
		
		BEGIN
		DECLARE spid INT UNSIGNED;
		SET spid := NULL;
		SET spid := (select id from specialities where speciality = tag);
		IF spid > 0 THEN
		insert into code_specs(code_id, sp_id) values(codeid,spid);
		ELSE
		insert into specialities(speciality) values(tag);
		SET spid := LAST_INSERT_ID();
		insert into lang_specs(lang_id,sp_id) values(langid,spid);
		insert into code_specs(code_id, sp_id) values(codeid,spid);
		END IF;
		END //
		*/
		
		$sql = "call tag_code_insert(?,?,?)";
		
		
		try{
			$sth = $this->pdo->prepare($sql);
			$sth->bindParam(1,$tag);
			$sth->bindParam(2,$this->codeid);
			$sth->bindParam(3,$this->langid);
			$res = $sth->execute();
		}
		catch(PDOException $e)
		{
			echo "" . $e->getMessage();
			echo "" . $e->getCode();
		}
		
		if(!$res)
		{
			$this->err[] = -1;
		}
		

	}
}