<?php
	

class MdbCodesInsert extends Mdb
{
	protected $codeid;
	protected $langid;
	protected $err = array(0);
	
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
		$this->tagInsert($params['tag']);
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
		
		/****Insert Code and get the code_id
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
		
		$sql = sprintf("call insert_code('%s','%s',%s,%s,'%s')",
		$params['code'],
		$params['description'],
		$params['lines'],
		$params['lang'],
		$params['date']
		);
		$res = mysql_query($sql) or die($sql.mysql_error());
		while($row = mysql_fetch_row($res))
		{
			$codeid = $row[0];
		}
		$this->codeid = $codeid;
		mysql_free_result($res);
	}
	
	public function tagInsert($tagcsv)
	{
		$tagcsv = rtrim($tagcsv,",");
		$tags = explode(",",$tagcsv);
		
		foreach($tags as $tag)
		{
			$sql = sprintf("select id from specialities where speciality = '%s'",$tag);
			$res = mysql_query($sql) or die($sql.mysql_error());
			
			if(mysql_num_rows($res)>0)
			{
				$row = mysql_fetch_row($res);
				$tagid = $row[0];
				//insert code_tag
				codeTagInsert($tagid);
			}
			else
			{
				//make new tag and get tagid
				//insert code_tag
				$tagid = makeTag($tag,$this->langid);
				//insert code_tag
				codeTagInsert($tagid);
			}
		}
	}
	
	public function makeTag($tag,$langid)
	{
		$sql = sprintf("call insert_specs('%s',%s)",
		$tag,
		$langid);
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
		$res = mysql_query($sql) or die($sql.mysql_error());
		$row=mysql_fetch_row($res);
		$tagid=$row[0];
		mysql_free_result($res);
		return $tagid;
	}
	

	
	public function codeTagInsert($tag)
	{
		$sql=sprintf("insert into code_specs(code_id,sp_id) values(%s,%s)",
		$this->codeid,
		$tag);
		$res = mysql_query($sql) or die($sql.mysql_error());
		if(!$res)
		{
			$this->err[] = -1;
		}
		
	}
}