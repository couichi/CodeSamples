<?php

include "classes/class.pdoconnect.php";



class PdoUpdateCode extends PdoConnect
{
	public function squery($sql)
	{
		$sth = $this->pdo->prepare($sql);
		$res = $sth->execute();
		
		$res = $sth->fetchAll(PDO::FETCH_CLASS,'thecode');
		
		echo "<form method=POST action=update_code.php>";

		echo "<div class=code>";
		$this->getTags($res[0]->id);
		
		echo "<h3><a href='code.php?id=".$res[0]->id."&ld=".$res[0]->langid."'>".$res[0]->id."</a> ";
		echo $res[0]->modified."</h3><br>";
		
		echo "<input type=hidden name=codeid value=".$res[0]->id.">";
		echo "<textarea rows=40 cols=80 name=code>";
		echo $res[0]->code;
		echo "</textarea><br>";
		echo "<textarea rows=5 cols=80 name=description>";
		echo $res[0]->description;
		echo "</textarea><br>";
		
		echo "<input type=submit>";
		echo "</form>";
		
		$_SESSION['code']=$res[0]->code;
		$_SESSION['description']=$res[0]->description;
		
	}
	
	public function commaRm($csv)
	{
		$csv = rtrim($csv,",");
		return $csv;
	}
	
	public function getTags($codeid)
	{
		//select sp_id, speciality from code_specs inner join specialities where sp_id=specialities.id and code_id=35
		$sql="select sp_id, speciality from code_specs innser join specialities where sp_id=specialities.id and code_id=$codeid";
		$sth = $this->pdo->prepare($sql);
		$sth->execute();
		$res = $sth->fetchAll();
		$tagids="";
		$tagdisp="";
		foreach($res as $row)
		{
			$specs[] = array($row['sp_id'],$row['speciality']);
			$tagids .= $row['sp_id'].",";
			$tagdisp .= $row['speciality'].",";
		}
		
		$tagids = $this->commaRm($tagids);
		$tagdisp = $this->commaRm($tagdisp);
		session_start();
		$_SESSION['tags']=$tagdisp;
		
		
		echo "<input type=hidden name=tagids value='".$tagids."'>";
		echo "<input type=text name=tag value='".$tagdisp."'>";
	}
	
	public function updateCode($_POST)
	{
		$code = $_POST['code'];
		$description = $_POST['description'];
		$linenum = $_POST['linenum'];
		$codeid = $_POST['codeid'];
		$date = date("Y-m-d H:i:s", time());
		$sql = "update codes set code = '$code', description = '$description', linenum = $linenum, modified = '$date' where id=$codeid";
		$res = $this->pdo->exec($sql) or die($res->errorInfo());
		//$sth = $this->pdo->prepare($sql);
		/*
		$sth->bindParam(1,$_POST['code']);
		$sth->bindParam(2,$_POST['description']);
		$sth->bindParam(3,$_POST['linenum']);
		$sth->bindParam(1,$date);
		$res = $sth->execute or die($sth->errorInfo());
		var_dump($sth);
		*/
		if($res)
		{
			return 1;
		}
		else
		{
			return -1;
		}
		
	}
	
	public function updateTags($tagcsv)
	{
		if($tagcsv=="" || $tagcsv==" ")
		{
			$codeid = $_POST['codeid'];
			
			//delete all tag
			try{
			$sql = "delete from code_specs where code_id=$codeid";
			//$sth = $this->pdo->prepare($sql);
			$res = $this->pdo->exec($sql) or die($this->pdo->errorInfo());
			//$sth->bindParam(1,$codeid);
			//$res = $sth->execute;
			}
			catch(PDOException $e)
			{
			echo "" . $e->getMessage();
			echo "" . $e->getCode();
			}
			//var_dump($sth);
			if($res)
			{
				return 1;
			}
			else
			{
				return -1;
			}
		}
		
		$tags=$this->commaRm($tagcsv);

		$tags = explode(",",$tags);
		
		foreach($tags as $tag)
		{
			if(strlen($tag)<2)
			{
			  echo $tag;
			  return -2;
			}
			else
			{
				$this->updateEachTag($tag);
			}
		}
		
		return 1;
	}
	
	public function updateEachTag($tag)
	{
		/*
			check if tag is in the database
			if it is, get tagid and check code_tag
				if code_tag rec exist do nothing
				else make a new code_tag rec
			else make new tag and make code_tag rec
		*/
	  //echo $tag;


	    $sql = "call update_tag(?,?)";
	    $sth = $this->pdo->prepare($sql);
	    $sth->bindParam(1,$tag);
	    $sth->bindParam(2,$codeid);
	    $res = $sth->execute;

	  /*
	    $sql = "call update_tag($tag,$codeid)";
	    $res = $this->pdo->exec($sql) or die($res->errorInfo());
	  */	
	}
}